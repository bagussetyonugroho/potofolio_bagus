<section id="tech-stack" class="py-24 lg:py-32 border-b relative" style="border-color: var(--border-hairline);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header & Filter Tabs -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-14 reveal-up">
            <div>
                <div class="badge-pill mb-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>04 // ARCHITECTURE &amp; TECH STACK</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-bold tracking-tight">
                    Technical Arsenal &amp; Ecosystem
                </h2>
                <p class="text-sm sm:text-base mt-3 max-w-2xl" style="color: var(--text-secondary);">
                    Teknologi, kerangka kerja, dan perangkat lunak yang saya gunakan sehari-hari untuk merancang, membangun, dan men-deploy aplikasi web berkinerja tinggi.
                </p>
            </div>

            <!-- Interactive Category Switcher -->
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="filter-tab stack-filter-btn active" data-stack-group="all">All Categories</button>
                @foreach(array_keys($tech_stack) as $categoryName)
                    <button type="button" class="filter-tab stack-filter-btn" data-stack-group="{{ $categoryName }}">{{ $categoryName }}</button>
                @endforeach
            </div>
        </div>

        <!-- Grouped Tech Stack Bento Matrices -->
        <div class="space-y-12">
            @foreach($tech_stack as $groupName => $groupData)
                <div class="stack-group-block reveal-up" data-group-name="{{ $groupName }}">
                    <!-- Group Header Bar -->
                    <div class="flex flex-wrap items-center justify-between gap-4 pb-4 mb-6 border-b" style="border-color: var(--border-hairline);">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center border"
                                 style="background: var(--bg-secondary); border-color: var(--border-strong); color: var(--accent-primary);">
                                <i data-lucide="{{ $groupData['icon'] }}" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h3 class="font-display text-xl font-bold">{{ $groupName }}</h3>
                                <p class="text-xs" style="color: var(--text-muted);">{{ $groupData['subtitle'] }}</p>
                            </div>
                        </div>
                        <span class="font-mono-tech text-xs px-3 py-1 rounded-full border"
                              style="background: var(--bg-secondary); border-color: var(--border-hairline); color: var(--text-secondary);">
                            {{ count($groupData['items']) }} Technologies
                        </span>
                    </div>

                    <!-- Responsive Grid of Technology Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                        @foreach($groupData['items'] as $tech)
                            <div class="editorial-card p-5 group">
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div class="flex items-center gap-3.5">
                                        <!-- Tech Monogram / Icon Box with Brand Accent -->
                                        <div class="w-11 h-11 rounded-xl flex items-center justify-center font-display font-bold text-sm border transition-transform duration-300 group-hover:scale-110"
                                             style="background: {{ $tech['color'] }}18; border-color: {{ $tech['color'] }}45; color: {{ $tech['color'] }};">
                                            {{ strtoupper(substr($tech['name'], 0, 2)) }}
                                        </div>
                                        <div>
                                            <h4 class="font-display font-bold text-base group-hover:text-indigo-400 transition-colors">
                                                {{ $tech['name'] }}
                                            </h4>
                                            <p class="text-xs" style="color: var(--text-muted);">{{ $tech['role'] }}</p>
                                        </div>
                                    </div>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-mono-tech uppercase border"
                                          style="background: var(--bg-secondary); border-color: var(--border-strong); color: var(--text-secondary);">
                                        {{ $tech['badge'] }}
                                    </span>
                                </div>

                                <!-- Proficiency Bar -->
                                <div class="space-y-1.5">
                                    <div class="flex items-center justify-between text-[11px] font-mono-tech">
                                        <span style="color: var(--text-muted);">PROFICIENCY</span>
                                        <span class="font-semibold" style="color: var(--text-primary);">{{ $tech['level'] }}</span>
                                    </div>
                                    <div class="w-full h-1.5 rounded-full overflow-hidden" style="background: var(--bg-secondary);">
                                        <div class="h-full rounded-full transition-all duration-700"
                                             style="width: {{ $tech['level'] }}; background: {{ $tech['color'] }};"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
