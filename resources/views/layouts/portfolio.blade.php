<!DOCTYPE html>
<html lang="id" data-theme="dark" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $profile['name'] }} — {{ $profile['role_primary'] }}. {{ $profile['tagline'] }}">
    <title>{{ $profile['name'] }} — {{ $profile['role_primary'] }} | Personal Portfolio</title>

    <!-- Google Fonts: Space Grotesk, Plus Jakarta Sans, JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

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
</head>
<body class="bg-architectural-grid antialiased selection:bg-indigo-500 selection:text-white">

    <!-- 1. ARCHITECTURAL PAGE PRELOADER -->
    <div id="page-preloader" aria-hidden="true">
        <div class="flex items-center justify-between text-xs font-mono-tech text-zinc-400">
            <div class="flex items-center gap-2.5">
                <span class="w-2 h-2 rounded-full bg-indigo-500 animate-ping"></span>
                <span>PORTFOLIO.SYSTEM // INITIALIZING</span>
            </div>
            <span>{{ strtoupper($profile['initials']) }} — EDITION 2026</span>
        </div>

        <div class="max-w-xl">
            <p class="font-mono-tech text-xs uppercase tracking-widest text-indigo-400 mb-2">Loading Executive Experience</p>
            <h2 class="font-display text-3xl sm:text-5xl font-bold text-white tracking-tight">{{ $profile['name'] }}</h2>
            <p class="text-sm text-zinc-400 mt-2">{{ $profile['role_primary'] }}</p>
        </div>

        <div class="space-y-3">
            <div class="flex items-baseline justify-between">
                <span class="font-mono-tech text-xs text-zinc-500">ASSETS &amp; INTERACTIVE ENGINE</span>
                <span id="preloader-count" class="font-display text-3xl sm:text-4xl font-bold text-white">00%</span>
            </div>
            <div class="preloader-bar-track">
                <div id="preloader-bar" class="preloader-bar-fill"></div>
            </div>
        </div>
    </div>

    <!-- 2. CUSTOM MAGNETIC CURSOR -->
    <div id="cursor-dot" class="cursor-dot"></div>
    <div id="cursor-ring" class="cursor-ring"></div>

    <!-- 3. SUBTLE AMBIENT BACKGROUND EFFECTS -->
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
