import fs from 'node:fs';
import path from 'node:path';
import { execFileSync } from 'node:child_process';
import { fileURLToPath } from 'node:url';

const rootDir = process.cwd();
const publicDir = path.join(rootDir, 'public');
const snapshotDir = path.join(rootDir, 'resources', 'vercel-snapshots');
const distDir = path.join(rootDir, 'dist');

function normalizeHtmlForSnapshot(html) {
  let out = html;
  // Convert absolute localhost URLs to root-relative paths
  out = out.replace(/https?:\/\/(localhost|127\.0\.0\.1)(:\d+)?\//g, '/');
  out = out.replace(/https?:\/\/(localhost|127\.0\.0\.1)(:\d+)?(?=["'])/g, '/');

  // Replace Vite generated preload/stylesheet/module script tags for /build/assets/* with placeholder
  const viteBlockRegex = /<link rel="preload" as="style" href="\/build\/assets\/[^"]+" \/>[\s\S]*?<script type="module" src="\/build\/assets\/[^"]+"><\/script>/;
  if (viteBlockRegex.test(out)) {
    out = out.replace(viteBlockRegex, '<!-- VITE_ASSETS_PLACEHOLDER -->');
  } else {
    out = out.replace(/<link[^>]+href="\/build\/assets\/[^"]+"[^>]*>/g, '');
    out = out.replace(/<script[^>]+src="\/build\/assets\/[^"]+"[^>]*><\/script>/g, '<!-- VITE_ASSETS_PLACEHOLDER -->');
  }

  return out;
}

function tryUpdateSnapshotsFromPhp() {
  if (
    !fs.existsSync(path.join(rootDir, 'vendor', 'autoload.php')) ||
    !fs.existsSync(path.join(rootDir, '.env'))
  ) {
    console.log('[vercel-build] Vendor or .env not present in build environment; using committed HTML snapshots.');
    return;
  }

  try {
    execFileSync('php', ['-v'], { stdio: 'ignore' });
  } catch {
    console.log('[vercel-build] PHP not found in build environment; using committed HTML snapshots.');
    return;
  }

  try {
    fs.mkdirSync(snapshotDir, { recursive: true });
    const phpCode = `
      require 'vendor/autoload.php';
      $app = require_once 'bootstrap/app.php';
      $kernel = $app->make(Illuminate\\Contracts\\Http\\Kernel::class);

      $reqIndex = Illuminate\\Http\\Request::create('/', 'GET');
      $resIndex = $kernel->handle($reqIndex);
      if ($resIndex->getStatusCode() === 200) {
          file_put_contents('resources/vercel-snapshots/index.raw.html', $resIndex->getContent());
      }

      $reqCv = Illuminate\\Http\\Request::create('/download-cv', 'GET');
      $resCv = $kernel->handle($reqCv);
      if ($resCv->getStatusCode() === 200) {
          file_put_contents('resources/vercel-snapshots/cv.raw.html', $resCv->getContent());
      }
    `;
    execFileSync('php', ['-r', phpCode], { cwd: rootDir, stdio: 'inherit' });

    const rawIndex = path.join(snapshotDir, 'index.raw.html');
    const rawCv = path.join(snapshotDir, 'cv.raw.html');

    if (fs.existsSync(rawIndex)) {
      const normalized = normalizeHtmlForSnapshot(fs.readFileSync(rawIndex, 'utf8'));
      fs.writeFileSync(path.join(snapshotDir, 'index.html'), normalized, 'utf8');
      fs.unlinkSync(rawIndex);
    }
    if (fs.existsSync(rawCv)) {
      const normalized = normalizeHtmlForSnapshot(fs.readFileSync(rawCv, 'utf8'));
      fs.writeFileSync(path.join(snapshotDir, 'cv.html'), normalized, 'utf8');
      fs.unlinkSync(rawCv);
    }
    console.log('[vercel-build] Refreshed HTML snapshots from Laravel Blade views.');
  } catch (err) {
    console.warn('[vercel-build] Warning: Could not refresh snapshots via PHP, using existing snapshots.', err.message);
  }
}

function buildViteAssetTags() {
  const manifestPath = path.join(publicDir, 'build', 'manifest.json');
  if (!fs.existsSync(manifestPath)) {
    throw new Error('public/build/manifest.json not found. Run vite build first.');
  }
  const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
  const entry = manifest['resources/js/app.js'] || Object.values(manifest).find(item => item.isEntry);
  if (!entry) {
    throw new Error('Entry point resources/js/app.js not found in manifest.json');
  }

  const tags = [];
  if (Array.isArray(entry.css)) {
    for (const cssFile of entry.css) {
      tags.push(`<link rel="stylesheet" href="/build/${cssFile}" />`);
    }
  }
  if (entry.file) {
    tags.push(`<script type="module" src="/build/${entry.file}"></script>`);
  }
  return tags.join('\n    ');
}

function copyDirRecursive(src, dest) {
  if (!fs.existsSync(src)) return;
  fs.mkdirSync(dest, { recursive: true });
  for (const item of fs.readdirSync(src, { withFileTypes: true })) {
    const srcPath = path.join(src, item.name);
    const destPath = path.join(dest, item.name);
    if (item.isDirectory()) {
      copyDirRecursive(srcPath, destPath);
    } else {
      fs.copyFileSync(srcPath, destPath);
    }
  }
}

export function buildStaticDist() {
  tryUpdateSnapshotsFromPhp();

  const viteTags = buildViteAssetTags();

  // Clean & create dist directory
  if (fs.existsSync(distDir)) {
    fs.rmSync(distDir, { recursive: true, force: true });
  }
  fs.mkdirSync(distDir, { recursive: true });

  // 1. Copy static asset directories from public/ to dist/
  for (const folder of ['build', 'css', 'js', 'images']) {
    copyDirRecursive(path.join(publicDir, folder), path.join(distDir, folder));
  }
  for (const file of ['favicon.ico', 'robots.txt']) {
    const srcFile = path.join(publicDir, file);
    if (fs.existsSync(srcFile)) {
      fs.copyFileSync(srcFile, path.join(distDir, file));
    }
  }

  // 2. Render dist/index.html
  const indexSnapshotPath = path.join(snapshotDir, 'index.html');
  if (!fs.existsSync(indexSnapshotPath)) {
    throw new Error('Missing resources/vercel-snapshots/index.html');
  }
  const indexHtml = fs
    .readFileSync(indexSnapshotPath, 'utf8')
    .replace('<!-- VITE_ASSETS_PLACEHOLDER -->', viteTags);
  fs.writeFileSync(path.join(distDir, 'index.html'), indexHtml, 'utf8');

  // 3. Render dist/download-cv/index.html
  const cvSnapshotPath = path.join(snapshotDir, 'cv.html');
  if (fs.existsSync(cvSnapshotPath)) {
    const cvDir = path.join(distDir, 'download-cv');
    fs.mkdirSync(cvDir, { recursive: true });
    const cvHtml = fs
      .readFileSync(cvSnapshotPath, 'utf8')
      .replace('<!-- VITE_ASSETS_PLACEHOLDER -->', viteTags);
    fs.writeFileSync(path.join(cvDir, 'index.html'), cvHtml, 'utf8');
  }

  console.log('[vercel-build] Successfully generated static output in dist/');
}

if (process.argv[1] && path.resolve(process.argv[1]) === path.resolve(fileURLToPath(import.meta.url))) {
  buildStaticDist();
}
