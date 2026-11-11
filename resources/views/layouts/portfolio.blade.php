<!DOCTYPE html>
<html lang="id" data-theme="dark" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $profile['name'] }} — {{ $profile['role_primary'] }}. {{ $profile['tagline'] }}">
    <title>{{ $profile['name'] }} — {{ $profile['role_primary'] }} | Personal Portfolio</title>

    <!-- Google Fonts: Archivo Black, Syne, Space Grotesk, Plus Jakarta Sans, JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN (Instant Utility Engine) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: ['selector', '[data-theme="dark"]'],
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    }
                }
            }
        };
    </script>

    <!-- Custom Portfolio Design System Styles -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- React Bits 3D Lanyard Bundle -->
    @vite(['resources/js/app.js'])
</head>
<body class="bg-architectural-grid antialiased selection:bg-indigo-500 selection:text-white">

    <!-- 1. WELCOME SPLASH PRELOADER (ON REFRESH / ENTRY) -->
    <div id="page-preloader" aria-hidden="true">
        <div class="preloader-welcome-shell">
            <!-- Top 3 Circular Icons -->
            <div class="preloader-icons-row">
                <div class="preloader-icon-circle" style="--delay: 0.1s">
                    <i data-lucide="code-2" class="w-4 h-4"></i>
                </div>
                <div class="preloader-icon-circle" style="--delay: 0.24s">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </div>
                <div class="preloader-icon-circle" style="--delay: 0.38s">
                    <i data-lucide="globe" class="w-4 h-4"></i>
                </div>
            </div>

            <!-- Center Wide Extended Welcome Text -->
            <div class="preloader-title-group">
                <h1 class="preloader-title-line">
                    <span class="preloader-word preloader-word-chromatic" style="--w-delay: 0.35s">Welcome</span>
                    <span class="preloader-word" style="--w-delay: 0.48s">to</span>
                    <span class="preloader-word" style="--w-delay: 0.58s">my</span>
                </h1>
                <h2 class="preloader-title-line mt-1.5 sm:mt-2">
                    <span class="preloader-word" style="--w-delay: 0.72s">Portfolio</span>
                    <span class="preloader-word" style="--w-delay: 0.86s">Website</span>
                </h2>
            </div>

            <!-- Bottom Website URL Pill -->
            <div class="preloader-url-pill" style="--pill-delay: 1.05s">
                <span id="preloader-url-text">stybagus.devs.surf</span>
            </div>
        </div>
    </div>

    <!-- 2. SUBTLE AMBIENT BACKGROUND EFFECTS -->
    <div class="ambient-orb-1"></div>
    <div class="ambient-orb-2"></div>

    <!-- 4. TOAST NOTIFICATION CONTAINER -->
    <div id="toast-container" class="fixed bottom-6 left-6 z-[300] flex flex-col gap-2.5 max-w-sm"></div>

    <!-- 5. MAIN CONTENT -->
    <div class="relative z-10">
        @yield('content')
    </div>

    <!-- 6. BACK TO TOP BUTTON WITH SCROLL PROGRESS -->
    <button id="back-to-top" type="button" aria-label="Back to top" title="Kembali ke atas">
        <svg class="absolute inset-0 w-full h-full -rotate-90" viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="22" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="2"></circle>
            <circle id="scroll-progress-circle" cx="24" cy="24" r="22" fill="none" stroke="#6366F1" stroke-width="2"
                    stroke-dasharray="138" stroke-dashoffset="138" stroke-linecap="round"></circle>
        </svg>
        <i data-lucide="arrow-up" class="w-4 h-4 relative z-10"></i>
    </button>

    <!-- Custom Portfolio Interactive JS -->
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
