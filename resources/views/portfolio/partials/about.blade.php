<section id="about" class="py-20 lg:py-24 min-h-screen flex items-center border-b relative overflow-hidden" style="border-color: var(--border-hairline);">
    <div class="w-[93.5%] max-w-[1680px] mx-auto px-3 sm:px-8 lg:px-10 w-full">
        <!-- Top Row: Left Bio & Typography + Right Circular Portrait -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <!-- Left 7 Columns: Eyebrow, 3-Line Extended Name, Description, Quote Box & CTA Buttons -->
            <div class="lg:col-span-7 space-y-6 reveal-up">
                <!-- Eyebrow -->
                <div class="font-mono-tech text-[11px] uppercase tracking-[0.24em] text-zinc-500">
                    ABOUT ME
                </div>

                <!-- 3-Line Extended Display Name -->
                <div class="pt-1 pb-1 overflow-visible">
                    <h2 class="hero-display-extended text-3xl sm:text-5xl xl:text-[3.35rem] text-white tracking-tight leading-[1.08] select-none">
                        <span class="block">Bagus</span>
                        <span class="block mt-1">Setyo</span>
                        <span class="block mt-1">Nugroho</span>
                    </h2>
                </div>

                <!-- Description Paragraph -->
                <p class="text-xs sm:text-[13.5px] leading-[1.9] text-zinc-400 max-w-[540px]">
                    Halo semuanya, saya Bagus Setyo Nugroho, biasa dipanggil Bagus. Saya mahasiswa Informatika UISI yang antusias mendalami dunia frontend development dan UI design. Fokus saya adalah mengubah ide atau konsep visual menjadi antarmuka web interaktif yang responsif, nyaman digunakan, dan berkarakter kuat. Senang bisa berkenalan!
                </p>

                <!-- Italic Quote Pill Box -->
                <div class="pt-1">
                    <div class="inline-block px-6 py-3.5 rounded-xl border border-white/10 bg-white/[0.02]">
                        <p class="text-xs sm:text-[13px] italic text-zinc-200 font-medium">
                            "Turning ideas into clean, modern, and meaningful digital experiences."
                        </p>
                    </div>
                </div>

                <!-- Action Buttons: Download CV & View Projects -->
                <div class="flex flex-wrap items-center gap-3.5 pt-1">
                    <a href="{{ route('portfolio.cv') }}" target="_blank"
                       class="px-5 py-3 rounded-xl bg-white text-zinc-950 font-semibold text-xs sm:text-[13px] inline-flex items-center gap-2.5 hover:bg-zinc-200 transition shadow-sm">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>Download CV</span>
                    </a>

                    <a href="#projects"
                       class="px-5 py-3 rounded-xl bg-transparent text-white border border-white/25 font-semibold text-xs sm:text-[13px] inline-flex items-center gap-2 hover:bg-white/[0.04] hover:border-white/45 transition">
                        <span class="text-xs leading-none">↗</span>
                        <span>View Projects</span>
                    </a>
                </div>
            </div>

            <!-- Right 5 Columns: Circular Studio Portrait -->
            <div class="lg:col-span-5 flex justify-center lg:justify-end lg:pr-10 reveal-up reveal-delay-1">
                <div class="p-3 rounded-full border border-white/[0.07] bg-white/[0.01] shadow-2xl">
                    <div class="w-60 h-60 sm:w-72 sm:h-72 lg:w-[300px] lg:h-[300px] rounded-full overflow-hidden border border-white/15 bg-zinc-950 relative">
                        <img src="{{ asset('/images/bagus-about-profile.jpg') }}?v=3"
                             alt="{{ $profile['name'] }}"
                             class="w-full h-full object-cover object-[center_45%] transition-transform duration-500 hover:scale-105">
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Row: 3 Horizontal Metric Cards (PROJECTS, CERTIFICATES, COMPLETED WORKS) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 mt-14 lg:mt-16 reveal-up reveal-delay-2">
            <!-- Card 1: PROJECTS -->
            <a href="#projects"
               class="rounded-2xl border border-white/[0.08] bg-zinc-900/40 backdrop-blur-sm px-6 py-5 sm:px-7 sm:py-6 flex flex-col justify-between min-h-[122px] hover:border-white/20 hover:bg-zinc-900/60 transition group">
                <div class="flex items-center justify-between">
                    <div class="w-9 h-9 rounded-full bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-zinc-300">
                        <i data-lucide="code-2" class="w-4 h-4"></i>
                    </div>
                    <span class="font-display text-xl sm:text-2xl font-bold text-white tracking-tight stat-counter"
                          data-target="{{ count($projects) }}"
                          data-suffix="">{{ count($projects) }}</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <span class="font-mono-tech text-[11px] uppercase tracking-[0.12em] text-zinc-300">PROJECTS</span>
                    <span class="text-xs text-zinc-400 group-hover:text-white group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">↗</span>
                </div>
            </a>

            <!-- Card 2: CERTIFICATES -->
            <a href="#certificates"
               class="rounded-2xl border border-white/[0.08] bg-zinc-900/40 backdrop-blur-sm px-6 py-5 sm:px-7 sm:py-6 flex flex-col justify-between min-h-[122px] hover:border-white/20 hover:bg-zinc-900/60 transition group">
                <div class="flex items-center justify-between">
                    <div class="w-9 h-9 rounded-full bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-zinc-300">
                        <i data-lucide="award" class="w-4 h-4"></i>
                    </div>
                    <span class="font-display text-xl sm:text-2xl font-bold text-white tracking-tight stat-counter"
                          data-target="{{ count($certificates) }}"
                          data-suffix="">{{ count($certificates) }}</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <span class="font-mono-tech text-[11px] uppercase tracking-[0.12em] text-zinc-300">CERTIFICATES</span>
                    <span class="text-xs text-zinc-400 group-hover:text-white group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">↗</span>
                </div>
            </a>

            <!-- Card 3: COMPLETED WORKS -->
            <a href="#projects"
               class="rounded-2xl border border-white/[0.08] bg-zinc-900/40 backdrop-blur-sm px-6 py-5 sm:px-7 sm:py-6 flex flex-col justify-between min-h-[122px] hover:border-white/20 hover:bg-zinc-900/60 transition group">
                <div class="flex items-center justify-between">
                    <div class="w-9 h-9 rounded-full bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-zinc-300">
                        <i data-lucide="globe" class="w-4 h-4"></i>
                    </div>
                    <span class="font-display text-xl sm:text-2xl font-bold text-white tracking-tight stat-counter"
                          data-target="18"
                          data-suffix="">18</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <span class="font-mono-tech text-[11px] uppercase tracking-[0.12em] text-zinc-300">COMPLETED WORKS</span>
                    <span class="text-xs text-zinc-400 group-hover:text-white group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">↗</span>
                </div>
            </a>
        </div>
    </div>
</section>
