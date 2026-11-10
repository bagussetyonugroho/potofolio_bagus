<section id="home" class="relative min-h-screen pt-36 pb-20 lg:pt-44 lg:pb-28 flex items-center border-b" style="border-color: var(--border-hairline);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <!-- Top Architectural Metadata Strip -->
        <div class="flex flex-wrap items-center justify-between gap-4 pb-8 mb-10 border-b text-xs font-mono-tech"
             style="border-color: var(--border-hairline); color: var(--text-muted);">
            <div class="flex items-center gap-3">
                <span class="text-indigo-400 font-semibold">00 // PERSONAL PORTFOLIO</span>
                <span class="hidden sm:inline">—</span>
                <span class="hidden sm:inline">{{ $profile['institution'] }} • {{ $profile['study_program'] }} ({{ $profile['semester'] }})</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                <span class="w-2 h-2 rounded-full bg-emerald-500 -ml-4"></span>
                <span class="text-emerald-400 font-medium">“{{ $profile['tagline'] }}”</span>
            </div>
        </div>

        <!-- Main 12-Column Editorial Hero Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">
            <!-- Left 7 Columns: Typography, Typing Role, Summary, CTA Buttons, Socials -->
            <div class="lg:col-span-7 space-y-6 reveal-up">
                <!-- Greeting Pill & Institution -->
                <div class="inline-flex items-center flex-wrap gap-2.5 px-4 py-2 rounded-full border"
                     style="background: var(--bg-secondary); border-color: var(--border-strong);">
                    <span class="text-xs font-mono-tech uppercase tracking-widest text-indigo-400 font-semibold">{{ $profile['greeting'] }}</span>
                    <span class="w-1 h-1 rounded-full bg-zinc-500"></span>
                    <span class="text-xs font-mono-tech" style="color: var(--text-secondary);">{{ $profile['role_primary'] }}</span>
                </div>

                <!-- Primary Display Headline (Full Name + Institution Subtitle) -->
                <div class="space-y-3">
                    <h1 class="font-display text-4xl sm:text-6xl xl:text-7xl font-bold tracking-tight leading-[1.04]">
                        <span class="block">{{ $profile['name'] }}</span>
                    </h1>

                    <p class="font-display text-base sm:text-xl font-medium" style="color: var(--text-secondary);">
                        {{ $profile['hero_subtitle'] }}
                    </p>

                    <!-- Animated Typing Profession Line -->
                    <div class="flex items-center flex-wrap gap-2 pt-1 text-lg sm:text-2xl font-display font-semibold">
                        <span style="color: var(--text-muted);">&gt;</span>
                        <span id="hero-typing-text"
                              class="text-gradient-editorial"
                              data-roles='@json($profile["typing_roles"])'>{{ $profile['typing_roles'][0] }}</span>
                        <span class="typing-caret" aria-hidden="true"></span>
                    </div>
                </div>

                <!-- Hero Description Paragraphs -->
                <div class="space-y-3 max-w-2xl">
                    <p class="text-base sm:text-lg leading-relaxed" style="color: var(--text-secondary);">
                        {{ $profile['description'] }}
                    </p>
                    <p class="text-sm sm:text-base leading-relaxed" style="color: var(--text-secondary);">
                        {{ $profile['description_secondary'] }}
                    </p>
                    <p class="font-display font-semibold text-sm sm:text-base text-indigo-400 pt-1">
                        ✦ {{ $profile['hero_cta_line'] }}
                    </p>
                </div>

                <!-- Primary & Secondary CTA Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#projects" class="btn-editorial-primary group">
                        <span>Explore My Work</span>
                        <i data-lucide="arrow-up-right" class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>
                    </a>

                    <a href="{{ route('portfolio.cv') }}" target="_blank" class="btn-editorial-secondary group">
                        <i data-lucide="download" class="w-4 h-4 text-indigo-400 transition-transform duration-300 group-hover:translate-y-0.5"></i>
                        <span>Download CV</span>
                    </a>
                </div>

                <!-- Official Social Media Bar -->
                <div class="pt-6 border-t flex flex-wrap items-center justify-between gap-4" style="border-color: var(--border-hairline);">
                    <div class="flex items-center gap-2.5">
                        <span class="font-mono-tech text-xs uppercase tracking-wider mr-2" style="color: var(--text-muted);">Connect //</span>
                        @foreach($socials as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                               class="w-10 h-10 rounded-full border flex items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:border-indigo-500 hover:text-indigo-400"
                               style="border-color: var(--border-strong); background: var(--bg-secondary); color: var(--text-primary);"
                               aria-label="{{ $social['name'] }}" title="{{ $social['name'] }} ({{ $social['handle'] }})">
                                @include('portfolio.partials.social-icon', ['icon' => $social['icon'], 'class' => 'w-4 h-4'])
                            </a>
                        @endforeach
                    </div>

                    <div class="flex items-center gap-3 text-xs font-mono-tech" style="color: var(--text-muted);">
                        <span>INFORMATICS • UISI • SEM 5</span>
                    </div>
                </div>
            </div>

            <!-- Right 5 Columns: Studio Portrait Frame & Floating Elements -->
            <div class="lg:col-span-5 relative reveal-up reveal-delay-2">
                <!-- Floating Badge Top Left -->
                <div class="floating-badge-slow hidden sm:flex items-center gap-3 px-4 py-2.5 rounded-2xl border shadow-2xl absolute -top-5 -left-5 z-20 backdrop-blur-xl"
                     style="background: var(--bg-card-solid); border-color: var(--border-strong);">
                    <div class="w-8 h-8 rounded-xl bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-indigo-400">
                        <i data-lucide="code-2" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block font-display font-bold text-xs">Informatics Student</span>
                        <span class="block font-mono-tech text-[10px]" style="color: var(--text-muted);">UISI • Semester 5</span>
                    </div>
                </div>

                <!-- Floating Tagline Badge Top Right -->
                <div class="floating-badge-delayed hidden sm:flex items-center gap-3 px-4 py-2.5 rounded-2xl border shadow-2xl absolute top-14 -right-4 z-20 backdrop-blur-xl"
                     style="background: var(--bg-card-solid); border-color: var(--border-strong);">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emerald-400">
                        <i data-lucide="sparkles" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block font-display font-bold text-xs">Aspiring Software Dev</span>
                        <span class="block font-mono-tech text-[10px]" style="color: var(--text-muted);">Web • Software • UI/UX</span>
                    </div>
                </div>

                <!-- Architectural Portrait Container -->
                <div class="editorial-card p-3 sm:p-4 relative group">
                    <div class="relative rounded-xl overflow-hidden border aspect-[4/5] bg-zinc-950" style="border-color: var(--border-hairline);">
                        <img src="{{ asset($profile['avatar_url']) }}"
                             alt="{{ $profile['name'] }} — Informatics Student at UISI"
                             class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">

                        <!-- Subtle Editorial Vignette & Identity Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/15 to-transparent pointer-events-none"></div>

                        <div class="absolute bottom-3.5 left-3.5 right-3.5 p-3.5 rounded-xl border border-white/15 bg-zinc-950/80 backdrop-blur-md flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 ring-4 ring-emerald-500/20 shrink-0"></span>
                                <div class="truncate">
                                    <div class="font-display font-bold text-xs sm:text-sm text-white tracking-wide truncate">{{ strtoupper($profile['name']) }}</div>
                                    <div class="font-mono-tech text-[10px] text-zinc-400 truncate">INFORMATICS STUDENT @ UISI</div>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-mono-tech font-semibold bg-indigo-500/20 text-indigo-300 border border-indigo-500/40 shrink-0">
                                UISI • SEM 5
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
