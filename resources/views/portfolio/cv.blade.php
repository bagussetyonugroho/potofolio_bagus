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
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0B0B0E;
            color: #FAFAFA;
            line-height: 1.55;
            padding: 2rem 1rem 3rem;
            min-height: 100vh;
        }
        .toolbar {
            max-width: 780px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
            background: #141418;
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 0.875rem 1.25rem;
            border-radius: 14px;
            color: #FAFAFA;
        }
        .toolbar-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.1rem;
            border-radius: 9px;
            font-size: 0.84rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: 0.2s ease;
        }
        .btn-outline {
            background: transparent;
            border-color: rgba(255, 255, 255, 0.18);
            color: #E4E4E7;
        }
        .btn-outline:hover { background: rgba(255, 255, 255, 0.08); }
        .btn-primary {
            background: #FAFAFA;
            color: #09090B;
        }
        .btn-primary:hover { background: #E4E4E7; }
        .cv-sheet {
            max-width: 780px;
            margin: 0 auto;
            background: var(--paper);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .cv-sheet img {
            display: block;
            width: 100%;
            height: auto;
        }
        @media print {
            body { background: #FFF; padding: 0; }
            .toolbar { display: none !important; }
            .cv-sheet {
                box-shadow: none;
                border: none;
                border-radius: 0;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="toolbar">
        <div>
            <strong style="font-family: 'Space Grotesk', sans-serif;">{{ $profile['name'] }}</strong>
            <span style="color: #A1A1AA; font-size: 0.85rem; margin-left: 0.5rem;">— Curriculum Vitae</span>
        </div>
        <div class="toolbar-actions">
            <a href="{{ route('portfolio.index') }}" class="btn btn-outline">← Kembali ke Portfolio</a>
            <a href="/images/cv-bagus-setyo-nugroho.jpg" download="CV-Bagus-Setyo-Nugroho.jpg" class="btn btn-outline">Unduh Gambar CV</a>
            <button onclick="window.print()" class="btn btn-primary">Cetak / Simpan PDF</button>
        </div>
    </div>

    <main class="cv-sheet">
        <img src="/images/cv-bagus-setyo-nugroho.jpg" alt="Curriculum Vitae — {{ $profile['name'] }}">
    </main>
</body>
</html>
