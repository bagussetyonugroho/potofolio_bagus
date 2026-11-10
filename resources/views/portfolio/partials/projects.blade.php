<section id="projects" class="py-24 lg:py-32 border-b relative" style="border-color: var(--border-hairline);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header & Category Filter -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-14 reveal-up">
            <div>
                <div class="badge-pill mb-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>02 // SELECTED WORKS &amp; CASE STUDIES</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-bold tracking-tight">
                    Featured Engineering Projects
                </h2>
                <p class="text-sm sm:text-base mt-3 max-w-2xl" style="color: var(--text-secondary);">
                    Kurasi proyek pilihan yang memadukan arsitektur kode modern, performa tinggi, serta desain antarmuka berstandar produksi.
                </p>
            </div>

            <!-- Interactive Category Filter Tabs -->
            <div class="flex flex-wrap items-center gap-2" role="tablist" aria-label="Project Categories">
                <button type="button" class="filter-tab project-filter-btn active" data-filter="all">All Works ({{ count($projects) }})</button>
                <button type="button" class="filter-tab project-filter-btn" data-filter="Full-Stack">Full-Stack</button>
                <button type="button" class="filter-tab project-filter-btn" data-filter="Frontend UI">Frontend UI</button>
                <button type="button" class="filter-tab project-filter-btn" data-filter="Web App">Web App</button>
                <button type="button" class="filter-tab project-filter-btn" data-filter="Design System">Design System</button>
            </div>
        </div>

        <!-- 2-Column Editorial Project Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($projects as $project)
                <article class="editorial-card project-card-item flex flex-col justify-between transition-all duration-300 reveal-up"
                         data-category="{{ $project['category'] }}">
                    <div>
                        <!-- Browser Window Mockup & Zoomable Thumbnail -->
                        <div class="project-thumb-wrap border-b bg-zinc-950" style="border-color: var(--border-hairline);">
                            <!-- Browser Top Chrome -->
                            <div class="px-4 py-2.5 flex items-center justify-between border-b bg-zinc-900/90" style="border-color: rgba(255,255,255,0.06);">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500/70"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500/70"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/70"></span>
                                </div>
                                <span class="font-mono-tech text-[11px] text-zinc-400">
                                    {{ trim(strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', trim(explode('—', $project['title'])[0]))), '-') }}.app
                                </span>
                                <span class="font-mono-tech text-[10px] px-2 py-0.5 rounded bg-white/5 text-zinc-300">
                                    {{ $project['year'] }}
                                </span>
                            </div>

                            <!-- High-Precision Architectural UI Thumbnail SVG (Zooms on Hover) -->
                            <div class="project-thumb-inner relative aspect-[16/10] w-full overflow-hidden p-5 flex flex-col justify-between"
                                 style="background: radial-gradient(circle at 80% 20%, {{ $project['accent'] }}28 0%, #09090B 70%);">
                                <!-- Top Mockup Telemetry Bar -->
                                <div class="flex items-center justify-between">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-mono-tech uppercase tracking-wider text-white border border-white/15 bg-black/50 backdrop-blur-md">
                                        {{ $project['category'] }}
                                    </span>
                                    <span class="font-mono-tech text-xs font-bold text-white/40">PROJECT // {{ $project['index'] }}</span>
                                </div>

                                <!-- Middle Simulated Application Interface -->
                                <div class="my-auto py-3">
                                    <div class="grid grid-cols-12 gap-3 items-center">
                                        <div class="col-span-7 space-y-2.5 bg-zinc-900/80 border border-white/10 rounded-xl p-3.5 backdrop-blur-md shadow-xl">
                                            <div class="flex items-center justify-between">
                                                <div class="h-2 w-20 rounded bg-white/25"></div>
                                                <div class="h-2 w-10 rounded" style="background: {{ $project['accent'] }};"></div>
                                            </div>
                                            <div class="h-5 w-4/5 rounded bg-white/90"></div>
                                            <div class="grid grid-cols-3 gap-2 pt-1">
                                                <div class="h-12 rounded-lg border border-white/10 bg-white/5 p-2 flex flex-col justify-between">
                                                    <span class="text-[8px] font-mono-tech text-zinc-400">PERF</span>
                                                    <span class="text-xs font-mono-tech font-bold text-emerald-400">99.4%</span>
                                                </div>
                                                <div class="h-12 rounded-lg border border-white/10 bg-white/5 p-2 flex flex-col justify-between">
                                                    <span class="text-[8px] font-mono-tech text-zinc-400">STATUS</span>
                                                    <span class="text-xs font-mono-tech font-bold text-white">LIVE</span>
                                                </div>
                                                <div class="h-12 rounded-lg border border-white/10 bg-white/5 p-2 flex flex-col justify-between">
                                                    <span class="text-[8px] font-mono-tech text-zinc-400">STACK</span>
                                                    <span class="text-xs font-mono-tech font-bold" style="color: {{ $project['accent'] }};">v4.0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-5 space-y-2.5">
                                            <div class="bg-zinc-900/80 border border-white/10 rounded-xl p-3 backdrop-blur-md">
                                                <div class="text-[9px] font-mono-tech text-zinc-400 mb-1">ARCHITECTURE</div>
                                                <div class="text-xs font-display font-bold text-white truncate">{{ explode('—', $project['title'])[0] }}</div>
                                                <div class="mt-2 h-1.5 w-full rounded-full bg-white/10 overflow-hidden">
                                                    <div class="h-full w-4/5 rounded-full" style="background: {{ $project['accent'] }};"></div>
                                                </div>
                                            </div>
                                            <div class="bg-zinc-900/80 border border-white/10 rounded-xl p-3 backdrop-blur-md flex items-center justify-between">
                                                <span class="text-[10px] font-mono-tech text-zinc-300">Production Ready</span>
                                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bottom Metrics Strip -->
                                <div class="flex items-center justify-between text-[11px] font-mono-tech text-zinc-300 pt-2 border-t border-white/10">
                                    <span>{{ $project['metrics'] }}</span>
                                    <button type="button"
                                            class="open-project-modal-btn text-indigo-300 hover:text-white underline underline-offset-4 cursor-pointer"
                                            data-title="{{ $project['title'] }}"
                                            data-category="{{ $project['category'] }}"
                                            data-year="{{ $project['year'] }}"
                                            data-desc="{{ $project['description'] }}"
                                            data-metrics="{{ $project['metrics'] }}"
                                            data-tech='@json($project["tech"])'
                                            data-highlights='@json($project["highlights"])'
                                            data-live="{{ $project['live_url'] }}"
                                            data-repo="{{ $project['repo_url'] }}">
                                        Quick Inspect →
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content Body -->
                        <div class="p-6 sm:p-8">
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="font-mono-tech text-xs text-indigo-400 font-semibold uppercase tracking-wider">
                                    {{ $project['index'] }} // {{ $project['category'] }}
                                </span>
                                <span class="font-mono-tech text-xs" style="color: var(--text-muted);">{{ $project['year'] }}</span>
                            </div>

                            <h3 class="font-display text-xl sm:text-2xl font-bold mb-3 leading-snug">
                                {{ $project['title'] }}
                            </h3>

                            <p class="text-sm leading-relaxed mb-5" style="color: var(--text-secondary);">
                                {{ $project['description'] }}
                            </p>

                            <!-- Key Highlights -->
                            <ul class="space-y-1.5 mb-6">
                                @foreach($project['highlights'] as $highlight)
                                    <li class="flex items-start gap-2 text-xs" style="color: var(--text-secondary);">
                                        <i data-lucide="check" class="w-3.5 h-3.5 text-emerald-400 shrink-0 mt-0.5"></i>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Tech Stack Pills -->
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach($project['tech'] as $techItem)
                                    <span class="px-3 py-1 rounded-full text-xs font-mono-tech border"
                                          style="background: var(--bg-secondary); border-color: var(--border-hairline); color: var(--text-primary);">
                                        {{ $techItem }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer Action Buttons: Live Preview & Source Code -->
                    <div class="px-6 sm:px-8 pb-6 sm:pb-8 pt-4 border-t flex flex-wrap items-center gap-3"
                         style="border-color: var(--border-hairline);">
                        <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener noreferrer"
                           class="btn-editorial-primary text-xs py-2.5 px-5 flex-1">
                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                            <span>Live Preview</span>
                        </a>

                        <a href="{{ $project['repo_url'] }}" target="_blank" rel="noopener noreferrer"
                           class="btn-editorial-secondary text-xs py-2.5 px-5 flex-1">
                            <i data-lucide="github" class="w-3.5 h-3.5"></i>
                            <span>Source Code</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <!-- Interactive Project Case Study Modal -->
    <div id="project-preview-modal" class="modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="pmodal-title">
        <div class="modal-panel p-6 sm:p-8">
            <div class="flex items-start justify-between gap-4 pb-4 mb-6 border-b" style="border-color: var(--border-hairline);">
                <div>
                    <span id="pmodal-category" class="font-mono-tech text-xs uppercase tracking-widest text-indigo-400">CATEGORY // YEAR</span>
                    <h3 id="pmodal-title" class="font-display text-2xl font-bold mt-1">Project Title</h3>
                </div>
                <button id="close-project-modal" type="button"
                        class="w-9 h-9 rounded-full border flex items-center justify-center hover:border-indigo-500"
                        style="border-color: var(--border-strong);" aria-label="Close modal">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

            <div class="space-y-5">
                <p id="pmodal-desc" class="text-sm sm:text-base leading-relaxed" style="color: var(--text-secondary);"></p>

                <div class="p-4 rounded-xl border" style="background: var(--bg-secondary); border-color: var(--border-hairline);">
                    <div class="font-mono-tech text-xs uppercase tracking-wider mb-2 text-emerald-400">Key Engineering Highlights</div>
                    <ul id="pmodal-highlights" class="space-y-2"></ul>
                </div>

                <div>
                    <div class="font-mono-tech text-xs uppercase tracking-wider mb-2" style="color: var(--text-muted);">Technologies Used</div>
                    <div id="pmodal-tech" class="flex flex-wrap gap-2"></div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t text-xs font-mono-tech" style="border-color: var(--border-hairline); color: var(--text-muted);">
                    <span>BENCHMARK METRICS:</span>
                    <span id="pmodal-metrics" class="text-indigo-400 font-semibold"></span>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <a id="pmodal-live-link" href="#" target="_blank" rel="noopener noreferrer" class="btn-editorial-primary text-xs py-3 px-6 flex-1">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span>Open Live Preview</span>
                    </a>
                    <a id="pmodal-repo-link" href="#" target="_blank" rel="noopener noreferrer" class="btn-editorial-secondary text-xs py-3 px-6 flex-1">
                        <i data-lucide="code-2" class="w-4 h-4"></i>
                        <span>View Source Code</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
