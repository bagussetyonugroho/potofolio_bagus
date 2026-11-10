<section id="about" class="py-24 lg:py-32 border-b relative" style="border-color: var(--border-hairline);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16 reveal-up">
            <div>
                <div class="badge-pill mb-4">
                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    <span>01 // ABOUT ME &amp; PROFESSIONAL IDENTITY</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-bold tracking-tight">
                    “{{ $about['intro_title'] }}”
                </h2>
                <p class="text-sm sm:text-base mt-3 max-w-2xl" style="color: var(--text-secondary);">
                    {{ $about['short_introduction'] }}
                </p>
            </div>
            <p class="font-mono-tech text-xs uppercase tracking-widest max-w-xs" style="color: var(--text-muted);">
                INFORMATICS STUDENT @ UNIVERSITAS INTERNASIONAL SEMEN INDONESIA (UISI)
            </p>
        </div>

        <!-- 4-Cell Bento Statistics Matrix -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-16">
            @foreach($stats as $idx => $stat)
                <div class="editorial-card p-6 sm:p-8 reveal-up {{ $idx === 0 ? 'border-indigo-500/30' : '' }}">
                    <div class="flex items-center justify-between mb-6">
                        <span class="font-mono-tech text-xs uppercase tracking-widest" style="color: var(--text-muted);">0{{ $idx + 1 }}</span>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center border"
                             style="background: var(--bg-secondary); border-color: var(--border-strong); color: var(--accent-primary);">
                            <i data-lucide="{{ $stat['icon'] }}" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <div class="font-display text-4xl sm:text-5xl font-bold tracking-tight mb-2 stat-counter"
                         data-target="{{ $stat['value'] }}"
                         data-suffix="{{ $stat['suffix'] }}">
                        {{ $stat['value'] }}{{ $stat['suffix'] }}
                    </div>
                    <div class="font-display font-semibold text-sm sm:text-base">{{ $stat['label'] }}</div>
                    <div class="text-xs mt-1" style="color: var(--text-muted);">{{ $stat['sublabel'] }}</div>
                </div>
            @endforeach
        </div>

        <!-- Two-Column About Me Editorial Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            <!-- COLUMN 1 (5 Cols): Personal Visual, Developer Profile Terminal & Career Vision Card -->
            <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-28 reveal-up">
                <!-- Personal Visual & Studio Card -->
                <div class="editorial-card p-4 group">
                    <div class="relative rounded-xl overflow-hidden aspect-[4/4.6] bg-zinc-950 border" style="border-color: var(--border-hairline);">
                        <img src="{{ asset($profile['about_photo_url'] ?? $profile['avatar_url']) }}"
                             alt="{{ $profile['name'] }} — Informatics UISI"
                             class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent flex flex-col justify-end p-6">
                            <span class="font-mono-tech text-[11px] uppercase tracking-widest text-indigo-400">{{ $profile['study_program'] }} • {{ $profile['semester'] }}</span>
                            <h3 class="font-display text-2xl font-bold text-white mt-0.5">{{ $profile['name'] }}</h3>
                            <p class="text-xs text-zinc-300 mt-1">{{ $profile['institution'] }}</p>
                        </div>
                    </div>

                    <!-- Interactive Code Profile Snippet -->
                    <div class="mt-4 rounded-xl p-4 font-mono-tech text-xs border"
                         style="background: var(--bg-primary); border-color: var(--border-hairline);">
                        <div class="flex items-center justify-between pb-2.5 mb-3 border-b" style="border-color: var(--border-hairline);">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500/80"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500/80"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/80"></span>
                            </div>
                            <span class="text-[11px]" style="color: var(--text-muted);">bagus.profile.ts</span>
                        </div>
                        <div class="space-y-1.5 leading-relaxed">
                            <div><span class="text-indigo-400">const</span> <span class="text-emerald-400">profile</span> = &#123;</div>
                            <div class="pl-4"><span style="color: var(--text-muted);">name:</span> <span class="text-amber-300">'{{ $profile['name'] }}'</span>,</div>
                            <div class="pl-4"><span style="color: var(--text-muted);">university:</span> <span class="text-amber-300">'UISI'</span>,</div>
                            <div class="pl-4"><span style="color: var(--text-muted);">major:</span> <span class="text-amber-300">'Informatika (Semester 5)'</span>,</div>
                            <div class="pl-4"><span style="color: var(--text-muted);">passion:</span> [<span class="text-amber-300">'Web Dev'</span>, <span class="text-amber-300">'Software'</span>, <span class="text-amber-300">'UI/UX'</span>],</div>
                            <div class="pl-4"><span style="color: var(--text-muted);">tagline:</span> <span class="text-emerald-400">'{{ $profile['tagline'] }}'</span></div>
                            <div>&#125;;</div>
                        </div>
                    </div>
                </div>

                <!-- High-Contrast Career Vision & Interests Card -->
                <div class="contrast-card p-6 sm:p-7">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-mono-tech text-xs uppercase tracking-widest font-semibold opacity-70">Minat &amp; Tujuan Karier</span>
                        <i data-lucide="compass" class="w-5 h-5"></i>
                    </div>
                    <p class="text-sm leading-relaxed font-medium opacity-90">
                        {{ $about['career_goals'] }}
                    </p>
                </div>
            </div>

            <!-- COLUMN 2 (7 Cols): Introduction, Professional Identity, Education, Core Skills, Organizations -->
            <div class="lg:col-span-7 space-y-8">
                <!-- 1. Perkenalan Diri & Professional Identity -->
                <div class="editorial-card p-6 sm:p-8 reveal-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-indigo-400">
                            <i data-lucide="user-check" class="w-4 h-4"></i>
                        </div>
                        <h3 class="font-display text-xl font-bold">Perkenalan Diri</h3>
                    </div>

                    <div class="space-y-4 text-sm sm:text-base leading-relaxed" style="color: var(--text-secondary);">
                        <p>{{ $about['introduction'] }}</p>
                        <p>{{ $about['introduction_secondary'] }}</p>
                        <p>{{ $about['introduction_tertiary'] }}</p>
                    </div>

                    <!-- Professional Identity Badges -->
                    <div class="mt-6 pt-6 border-t" style="border-color: var(--border-hairline);">
                        <div class="font-mono-tech text-xs uppercase tracking-wider mb-3" style="color: var(--text-muted);">
                            Professional Identity //
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($profile['professional_identities'] as $identity)
                                <span class="px-3.5 py-1.5 rounded-full text-xs font-mono-tech border flex items-center gap-2"
                                      style="background: var(--bg-secondary); border-color: var(--border-strong); color: var(--text-primary);">
                                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                    <span>{{ $identity }}</span>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- 2. Keahlian Utama (Core Skills) -->
                <div class="editorial-card p-6 sm:p-8 reveal-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emerald-400">
                            <i data-lucide="cpu" class="w-4 h-4"></i>
                        </div>
                        <h3 class="font-display text-xl font-bold">Keahlian Utama</h3>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($about['core_skills'] as $skill)
                            <div class="p-4 rounded-xl border transition hover:border-indigo-500/40"
                                 style="background: var(--bg-secondary); border-color: var(--border-hairline);">
                                <div class="flex items-start gap-3.5">
                                    <div class="w-9 h-9 rounded-lg flex items-center justify-center shrink-0 mt-0.5 border"
                                         style="background: var(--bg-primary); border-color: var(--border-strong); color: var(--accent-primary);">
                                        <i data-lucide="{{ $skill['icon'] }}" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-display font-bold text-base mb-1">{{ $skill['title'] }}</h4>
                                        <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--text-secondary);">{{ $skill['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 3. Latar Belakang Pendidikan -->
                <div class="editorial-card p-6 sm:p-8 reveal-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-indigo-400">
                            <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                        </div>
                        <h3 class="font-display text-xl font-bold">Latar Belakang Pendidikan</h3>
                    </div>

                    <div class="space-y-6">
                        @foreach($about['education'] as $edu)
                            <div class="relative pl-6 border-l-2 border-indigo-500/40 space-y-1.5">
                                <span class="absolute -left-[7px] top-1.5 w-3 h-3 rounded-full bg-indigo-500 ring-4 ring-indigo-500/20"></span>
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-mono-tech text-xs text-indigo-400 font-semibold">{{ $edu['period'] }}</span>
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-mono-tech border"
                                          style="background: var(--bg-secondary); border-color: var(--border-strong);">
                                        {{ $edu['highlight'] }}
                                    </span>
                                </div>
                                <h4 class="font-display text-lg font-bold">{{ $edu['degree'] }}</h4>
                                <p class="text-xs font-semibold uppercase tracking-wider" style="color: var(--text-muted);">{{ $edu['institution'] }}</p>
                                <p class="text-xs sm:text-sm leading-relaxed pt-1" style="color: var(--text-secondary);">{{ $edu['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 4. Pengalaman Organisasi & Komunitas -->
                <div class="editorial-card p-6 sm:p-8 reveal-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400">
                            <i data-lucide="users" class="w-4 h-4"></i>
                        </div>
                        <h3 class="font-display text-xl font-bold">Pengalaman Organisasi &amp; Komunitas</h3>
                    </div>

                    <div class="space-y-5">
                        @foreach($about['organizations'] as $org)
                            <div class="p-4 rounded-xl border" style="background: var(--bg-secondary); border-color: var(--border-hairline);">
                                <div class="flex flex-wrap items-center justify-between gap-2 mb-1">
                                    <h4 class="font-display font-bold text-base">{{ $org['role'] }}</h4>
                                    <span class="font-mono-tech text-xs text-emerald-400">{{ $org['period'] }}</span>
                                </div>
                                <p class="text-xs font-mono-tech mb-2" style="color: var(--text-muted);">{{ $org['organization'] }}</p>
                                <p class="text-xs sm:text-sm leading-relaxed" style="color: var(--text-secondary);">{{ $org['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
