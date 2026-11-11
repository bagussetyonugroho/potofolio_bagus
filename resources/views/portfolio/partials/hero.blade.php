<section id="home" class="relative min-h-screen pt-20 pb-20 flex items-center overflow-hidden border-b" style="border-color: var(--border-hairline);">
    <div class="w-[93.5%] max-w-[1680px] mx-auto px-3 sm:px-8 lg:px-10 w-full relative z-10 pointer-events-none">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <!-- Left 7 Columns: Minimalist Brutalist Typography, Typing Line, Description, Pills & Status -->
            <div class="lg:col-span-7 space-y-5 reveal-up">
                <!-- Top Status Indicator -->
                <div class="flex items-center gap-2.5 text-[11px] font-mono-tech uppercase tracking-[0.24em] text-zinc-500">
                    <span class="text-zinc-500">+</span>
                    <span>AVAILABLE FOR WORK</span>
                </div>

                <!-- Massive Extended Two-Line Display Headline -->
                <div class="pt-1 pb-1 overflow-visible">
                    <h1 class="hero-display-extended text-4xl sm:text-5xl md:text-6xl xl:text-[4.25rem] tracking-tight select-none">
                        <span class="block text-white">Frontend</span>
                        <span class="block text-zinc-500 mt-1.5">Developer</span>
                    </h1>
                </div>

                <!-- Monospace Typing Line -->
                <div class="pt-1 font-mono-tech text-sm sm:text-base text-zinc-300 flex items-center">
                    <span id="hero-typing-text"
                          data-roles='@json($profile["typing_roles"])'>Happy coding!</span>
                    <span class="typing-underscore" aria-hidden="true">_</span>
                </div>

                <!-- Clean Description Paragraph -->
                <p class="text-xs sm:text-[13.5px] leading-[1.9] text-zinc-400 max-w-[460px]">
                    Menciptakan website modern dengan tampilan clean, responsif, dan elegan. Mengubah ide dan desain menjadi pengalaman digital yang menarik dan mudah digunakan.
                </p>

                <!-- Tech Stack Pills -->
                <div class="flex flex-wrap items-center gap-3 pt-1">
                    <span class="px-4 py-1.5 rounded-full text-[11px] font-mono-tech text-zinc-300 border border-white/10 bg-white/[0.02]">Typescript</span>
                    <span class="px-4 py-1.5 rounded-full text-[11px] font-mono-tech text-zinc-300 border border-white/10 bg-white/[0.02]">React.js</span>
                    <span class="px-4 py-1.5 rounded-full text-[11px] font-mono-tech text-zinc-300 border border-white/10 bg-white/[0.02]">Tailwind</span>
                </div>

                <!-- Bottom Monospace Action & Availability Lines -->
                <div class="pt-3 space-y-2 font-mono-tech text-[11px] text-zinc-500">
                    <a href="#projects" class="pointer-events-auto block hover:text-zinc-300 transition w-fit">↓ explore my work below</a>
                    <p>/ open to full-time &amp; freelance opportunities</p>
                </div>
            </div>

            <!-- Right 5 Columns: Mobile/Tablet Spacer -->
            <div class="lg:col-span-5 h-[480px] lg:h-[600px] relative"></div>
        </div>
    </div>

    <!-- Full-Screen Hanging 3D Lanyard Stage (Draggable across the entire left & right screen) -->
    <div class="absolute inset-0 z-20 pointer-events-none">
        <div id="lanyard-root"
             class="pointer-events-auto w-full h-full"
             data-name="{{ $profile['name'] }}"
             data-role="{{ $profile['role_primary'] }}"
             data-institution="{{ $profile['institution'] }}"
             data-semester="{{ $profile['semester'] }}"
             data-avatar-url="{{ asset($profile['avatar_url']) }}"
             data-about-photo-url="{{ asset($profile['about_photo_url'] ?? $profile['avatar_url']) }}">
        </div>
    </div>

    <!-- Bottom Center Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30">
        <a href="#about" class="inline-flex items-center gap-2 font-mono-tech text-[11px] tracking-[0.26em] uppercase text-zinc-500 hover:text-zinc-300 transition">
            <span>SCROLL</span>
            <span>↓</span>
        </a>
    </div>
</section>
