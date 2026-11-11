import React, { useState, useEffect } from 'react';
import Lanyard from './Lanyard';

/**
 * Generates the original monochrome studio Front 3D ID Card image
 * using bagus-hero.jpg inside the clean white card frame.
 */
async function generateFrontCardImage(profile) {
  const width = 1024;
  const height = 1440;
  const canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;
  const ctx = canvas.getContext('2d');
  if (!ctx) return '/images/bagus-hero.jpg';

  ctx.imageSmoothingEnabled = true;
  ctx.imageSmoothingQuality = 'high';

  // 1. Clean light-gray / off-white outer card body frame
  ctx.fillStyle = '#e5e5e7';
  ctx.fillRect(0, 0, width, height);

  // 2. Inner rounded portrait window
  const frameX = 60;
  const frameY = 68;
  const frameW = width - 120;
  const frameH = height - 128;
  const radius = 26;

  // Always load the original hero portrait (/images/bagus-hero.jpg)
  const img = await new Promise(resolve => {
    const image = new Image();
    image.crossOrigin = 'anonymous';
    image.onload = () => resolve(image);
    image.onerror = () => resolve(null);
    image.src = '/images/bagus-hero.jpg';
  });

  ctx.save();
  ctx.beginPath();
  ctx.roundRect(frameX, frameY, frameW, frameH, radius);
  ctx.clip();

  // Studio dark base
  ctx.fillStyle = '#141417';
  ctx.fillRect(frameX, frameY, frameW, frameH);

  if (img) {
    // Clean upper-body portrait framing with full headroom above hair
    const sy = img.height * 0.025;
    const sh = img.height * 0.56;
    const sw = Math.min(img.width, sh * (frameW / frameH));
    const sx = (img.width - sw) / 2;

    ctx.save();
    ctx.filter = 'grayscale(100%) contrast(1.16) brightness(0.96)';
    ctx.drawImage(img, sx, sy, sw, sh, frameX, frameY, frameW, frameH);
    ctx.restore();
  }

  // Subtle studio vignette around edges & bottom (like original screenshot)
  const radialVig = ctx.createRadialGradient(
    frameX + frameW * 0.5,
    frameY + frameH * 0.42,
    frameW * 0.25,
    frameX + frameW * 0.5,
    frameY + frameH * 0.5,
    frameW * 0.78
  );
  radialVig.addColorStop(0, 'rgba(0, 0, 0, 0)');
  radialVig.addColorStop(1, 'rgba(0, 0, 0, 0.52)');
  ctx.fillStyle = radialVig;
  ctx.fillRect(frameX, frameY, frameW, frameH);

  const bottomGrad = ctx.createLinearGradient(0, frameY + frameH * 0.65, 0, frameY + frameH);
  bottomGrad.addColorStop(0, 'rgba(0, 0, 0, 0)');
  bottomGrad.addColorStop(1, 'rgba(0, 0, 0, 0.78)');
  ctx.fillStyle = bottomGrad;
  ctx.fillRect(frameX, frameY, frameW, frameH);

  ctx.restore();

  // Subtle crisp inner border around portrait window
  ctx.strokeStyle = 'rgba(0, 0, 0, 0.18)';
  ctx.lineWidth = 2;
  ctx.beginPath();
  ctx.roundRect(frameX, frameY, frameW, frameH, radius);
  ctx.stroke();

  // 3. Sleek vertical black clip at top center
  ctx.fillStyle = '#09090b';
  ctx.beginPath();
  ctx.roundRect(width / 2 - 12, 8, 24, 78, 6);
  ctx.fill();

  return canvas.toDataURL('image/png');
}

/**
 * Generates the black lanyard strap texture with crisp white vertical "3D CARD" text
 */
function generateStrapImage() {
  const width = 560;
  const height = 192;
  const canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;
  const ctx = canvas.getContext('2d');
  if (!ctx) return null;

  ctx.fillStyle = '#08080a';
  ctx.fillRect(0, 0, width, height);

  ctx.fillStyle = '#e4e4e7';
  ctx.font = '800 34px "Space Grotesk", "JetBrains Mono", sans-serif';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  if ('letterSpacing' in ctx) {
    ctx.letterSpacing = '3px';
  }
  ctx.fillText('3D CARD', width / 2, height / 2);

  return canvas.toDataURL('image/png');
}

export default function LanyardShowcase({
  profile = {},
  frontImage: customFrontImage,
  backImage: customBackImage,
  strapImage: customStrapImage
}) {
  const [cards, setCards] = useState({
    front: customFrontImage || '/images/bagus-hero.jpg',
    back: customBackImage || '/images/bagus-hero.jpg',
    strap: customStrapImage || undefined
  });

  useEffect(() => {
    let active = true;
    (async () => {
      try {
        const [frontUrl, strapUrl] = await Promise.all([
          customFrontImage ? Promise.resolve(customFrontImage) : generateFrontCardImage(profile),
          customStrapImage ? Promise.resolve(customStrapImage) : Promise.resolve(generateStrapImage())
        ]);
        if (active) {
          setCards({
            front: frontUrl || '/images/bagus-hero.jpg',
            back: customBackImage || frontUrl || '/images/bagus-hero.jpg',
            strap: strapUrl || undefined
          });
        }
      } catch {
        // Fallback to raw profile images if canvas fails
      }
    })();
    return () => {
      active = false;
    };
  }, [profile.name, customFrontImage, customBackImage, customStrapImage]);

  return (
    <div className="relative w-full h-full">
      <Lanyard
        frontImage={cards.front}
        backImage={cards.back}
        strapImage={cards.strap}
        imageFit="cover"
        cardColor="#e5e5e7"
        orientation="portrait"
        finish="matte"
        cornerRadius={0.2}
        size={0.38}
        anchor={0.747}
        strapLength={0.79}
        strapColor="#08080a"
        strapWidth={0.58}
        metal="black"
        gravity={1}
        damping={0.68}
        elasticity={0.65}
        breeze={0.05}
        interactive={true}
        intro={false}
      />
    </div>
  );
}
