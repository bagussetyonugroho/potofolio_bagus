<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae — {{ $profile['name'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #09090B;
            --paper: #FFFFFF;
            --ink: #09090B;
            --muted: #52525B;
            --border: #E4E4E7;
            --accent: #4F46E5;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #121215;
            color: var(--ink);
            line-height: 1.55;
            padding: 2.5rem 1rem;
        }
        .toolbar {
            max-width: 860px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #18181B;
            border: 1px solid #27272A;
            padding: 0.875rem 1.25rem;
            border-radius: 12px;
            color: #FAFAFA;
        }
        .toolbar-actions { display: flex; gap: 0.75rem; }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: 0.2s ease;
        }
        .btn-outline {
            background: transparent;
            border-color: #3F3F46;
            color: #E4E4E7;
        }
        .btn-outline:hover { background: #27272A; }
        .btn-primary {
            background: #FAFAFA;
            color: #09090B;
        }
        .btn-primary:hover { background: #E4E4E7; }
        .sheet {
            max-width: 860px;
            margin: 0 auto;
            background: var(--paper);
            padding: 3.25rem 3.5rem;
            border-radius: 14px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.45);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid var(--ink);
            padding-bottom: 1.5rem;
            margin-bottom: 1.75rem;
            gap: 1.5rem;
        }
        .name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }
        .role {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            color: var(--accent);
            font-weight: 600;
            margin-top: 0.35rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .contact-meta {
            text-align: right;
            font-size: 0.82rem;
            color: var(--muted);
            font-family: 'JetBrains Mono', monospace;
        }
        .contact-meta div { margin-bottom: 0.2rem; }
        .section { margin-bottom: 1.65rem; }
        .section-title {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--ink);
            border-bottom: 1px solid var(--border);
            padding-bottom: 0.4rem;
            margin-bottom: 0.9rem;
        }
        .summary { font-size: 0.92rem; color: #27272A; }
        .item { margin-bottom: 1rem; }
        .item-head {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            font-weight: 700;
            font-size: 0.95rem;
        }
        .item-sub {
            font-size: 0.84rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        .item-period {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.78rem;
            color: var(--muted);
        }
        .item-desc { font-size: 0.87rem; color: #3F3F46; }
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
            margin-top: 0.35rem;
        }
        .tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.72rem;
            padding: 0.15rem 0.5rem;
            border: 1px solid var(--border);
            border-radius: 4px;
            background: #F4F4F5;
        }
        @media print {
            body { background: #FFF; padding: 0; }
            .toolbar { display: none !important; }
            .sheet { box-shadow: none; padding: 1.5rem; max-width: 100%; }
        }
        @media (max-width: 640px) {
            .sheet { padding: 1.75rem 1.25rem; }
            .header { flex-direction: column; }
            .contact-meta { text-align: left; }
            .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="toolbar">
        <div>
            <strong style="font-family: 'Space Grotesk', sans-serif;">{{ $profile['name'] }}</strong>
            <span style="color: #A1A1AA; font-size: 0.85rem; margin-left: 0.5rem;">— Executive Curriculum Vitae</span>
        </div>
        <div class="toolbar-actions">
            <a href="{{ route('portfolio.index') }}" class="btn btn-outline">← Kembali ke Portfolio</a>
            <button onclick="window.print()" class="btn btn-primary">Cetak / Simpan PDF</button>
        </div>
    </div>

    <main class="sheet">
        <header class="header">
            <div>
                <h1 class="name">{{ $profile['name'] }}</h1>
                <div class="role">{{ $profile['role_primary'] }}</div>
            </div>
            <div class="contact-meta">
                <div>{{ $profile['email'] }}</div>
                <div>{{ $profile['phone'] }}</div>
                <div>{{ $profile['institution'] }}</div>
                <div>{{ $profile['location'] }}</div>
            </div>
        </header>

        <section class="section">
            <h2 class="section-title">01 // Executive Summary</h2>
            <p class="summary">{{ $about['introduction'] }} {{ $about['career_goals'] }}</p>
        </section>

        <section class="section">
            <h2 class="section-title">02 // Education & Academic Background</h2>
            @foreach($about['education'] as $edu)
                <div class="item">
                    <div class="item-head">
                        <span>{{ $edu['degree'] }}</span>
                        <span class="item-period">{{ $edu['period'] }}</span>
                    </div>
                    <div class="item-sub">{{ $edu['institution'] }} • {{ $edu['highlight'] }}</div>
                    <p class="item-desc">{{ $edu['description'] }}</p>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2 class="section-title">03 // Selected Engineering Projects</h2>
            @foreach(array_slice($projects, 0, 4) as $project)
                <div class="item">
                    <div class="item-head">
                        <span>{{ $project['title'] }} ({{ $project['category'] }})</span>
                        <span class="item-period">{{ $project['year'] }}</span>
                    </div>
                    <p class="item-desc">{{ $project['description'] }}</p>
                    <div class="tag-list">
                        @foreach($project['tech'] as $t)
                            <span class="tag">{{ $t }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2 class="section-title">04 // Leadership & Organizations</h2>
            @foreach($about['organizations'] as $org)
                <div class="item">
                    <div class="item-head">
                        <span>{{ $org['role'] }} — {{ $org['organization'] }}</span>
                        <span class="item-period">{{ $org['period'] }}</span>
                    </div>
                    <p class="item-desc">{{ $org['description'] }}</p>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2 class="section-title">05 // Technical Stack & Credentials</h2>
            <div class="grid-2">
                <div>
                    <strong style="font-size: 0.85rem;">Core Technologies</strong>
                    <div class="tag-list" style="margin-top: 0.5rem;">
                        @foreach($tech_stack as $group => $info)
                            @foreach($info['items'] as $tech)
                                <span class="tag">{{ $tech['name'] }}</span>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div>
                    <strong style="font-size: 0.85rem;">Verified Certifications</strong>
                    <ul style="font-size: 0.84rem; color: #3F3F46; margin-top: 0.5rem; padding-left: 1.1rem;">
                        @foreach($certificates as $cert)
                            <li style="margin-bottom: 0.25rem;"><strong>{{ $cert['title'] }}</strong> — {{ $cert['issuer'] }} ({{ $cert['year'] }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
