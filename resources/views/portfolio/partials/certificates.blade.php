<section id="certificates" class="py-24 lg:py-32 border-b relative" style="border-color: var(--border-hairline);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14 reveal-up">
            <div>
                <div class="badge-pill mb-4">
                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    <span>03 // VERIFIED CREDENTIALS &amp; HONORS</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-bold tracking-tight">
                    Professional Certificates
                </h2>
                <p class="text-sm sm:text-base mt-3 max-w-2xl" style="color: var(--text-secondary);">
                    Sertifikasi kompetensi berstandar industri internasional sebagai bukti dedikasi pada kualitas rekayasa perangkat lunak modern.
                </p>
            </div>
            <div class="font-mono-tech text-xs px-4 py-2 rounded-full border"
                 style="border-color: var(--border-strong); background: var(--bg-secondary); color: var(--text-secondary);">
                CLICK ANY CERTIFICATE FOR FULL PREVIEW
            </div>
        </div>

        <!-- 3-Column Premium Certificates Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($certificates as $cert)
                <article class="editorial-card flex flex-col justify-between group reveal-up cursor-pointer open-cert-modal"
                         data-title="{{ $cert['title'] }}"
                         data-issuer="{{ $cert['issuer'] }}"
                         data-badge="{{ $cert['issuer_badge'] }}"
                         data-date="{{ $cert['date'] }}"
                         data-credential="{{ $cert['credential_id'] }}"
                         data-category="{{ $cert['category'] }}"
                         data-desc="{{ $cert['description'] }}"
                         data-accent="{{ $cert['accent'] }}"
                         data-skills='@json($cert["skills"])'>
                    <div>
                        <!-- Certificate Graphic Thumbnail -->
                        <div class="project-thumb-wrap border-b bg-zinc-950 p-4" style="border-color: var(--border-hairline);">
                            <div class="project-thumb-inner relative rounded-xl overflow-hidden border p-5 aspect-[16/10] flex flex-col justify-between"
                                 style="background: linear-gradient(135deg, #111116 0%, #09090C 100%); border-color: {{ $cert['accent'] }}55;">
                                <!-- Subtle Corner Guilloche Accent -->
                                <div class="absolute -right-8 -top-8 w-28 h-28 rounded-full opacity-20 blur-xl"
                                     style="background: {{ $cert['accent'] }};"></div>

                                <!-- Top Certificate Header -->
                                <div class="flex items-center justify-between gap-2 relative z-10">
                                    <span class="px-2.5 py-0.5 rounded text-[10px] font-mono-tech font-bold tracking-wider uppercase text-white"
                                          style="background: {{ $cert['accent'] }}33; border: 1px solid {{ $cert['accent'] }}66;">
                                        {{ $cert['issuer_badge'] }}
                                    </span>
                                    <span class="font-mono-tech text-[10px] text-zinc-400">{{ $cert['year'] }}</span>
                                </div>

                                <!-- Center Certificate Title & Recipient -->
                                <div class="my-auto py-2 relative z-10">
                                    <div class="text-[9px] font-mono-tech uppercase tracking-widest text-zinc-400 mb-1">CERTIFICATE OF COMPLETION</div>
                                    <div class="font-display font-bold text-sm text-white leading-snug line-clamp-2">
                                        {{ $cert['title'] }}
                                    </div>
                                    <div class="text-[11px] text-zinc-300 mt-1.5 font-medium">
                                        Awarded to <span class="text-white underline decoration-indigo-500/60">{{ $profile['name'] }}</span>
                                    </div>
                                </div>

                                <!-- Bottom Seal & Credential ID -->
                                <div class="flex items-center justify-between pt-2 border-t border-white/10 text-[10px] font-mono-tech text-zinc-400 relative z-10">
                                    <span>ID: {{ $cert['credential_id'] }}</span>
                                    <span class="flex items-center gap-1 text-emerald-400">
                                        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                                        <span>Verified</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Certificate Metadata Body -->
                        <div class="p-6">
                            <div class="flex items-center justify-between text-xs font-mono-tech mb-2.5">
                                <span class="text-indigo-400 font-semibold">{{ $cert['issuer'] }}</span>
                                <span style="color: var(--text-muted);">{{ $cert['year'] }}</span>
                            </div>

                            <h3 class="font-display text-lg font-bold leading-snug mb-2.5 group-hover:text-indigo-400 transition-colors">
                                {{ $cert['title'] }}
                            </h3>

                            <p class="text-xs leading-relaxed line-clamp-2 mb-4" style="color: var(--text-secondary);">
                                {{ $cert['description'] }}
                            </p>

                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice($cert['skills'], 0, 3) as $skill)
                                    <span class="px-2.5 py-0.5 rounded-md text-[11px] font-mono-tech border"
                                          style="background: var(--bg-secondary); border-color: var(--border-hairline); color: var(--text-secondary);">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- View Certificate Button -->
                    <div class="px-6 pb-6 pt-3 border-t flex items-center justify-between" style="border-color: var(--border-hairline);">
                        <span class="font-mono-tech text-[11px]" style="color: var(--text-muted);">{{ $cert['credential_id'] }}</span>
                        <button type="button" class="inline-flex items-center gap-1.5 text-xs font-display font-bold text-indigo-400 group-hover:translate-x-1 transition-transform">
                            <i data-lucide="maximize-2" class="w-3.5 h-3.5"></i>
                            <span>View Certificate</span>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <!-- Certificate Interactive Modal Preview Lightbox -->
    <div id="certificate-modal" class="modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="cmodal-title">
        <div class="modal-panel p-6 sm:p-8">
            <!-- Modal Header -->
            <div class="flex items-start justify-between gap-4 pb-4 mb-6 border-b" style="border-color: var(--border-hairline);">
                <div>
                    <div class="flex items-center gap-2">
                        <span id="cmodal-badge" class="px-2.5 py-0.5 rounded text-[10px] font-mono-tech uppercase bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">VERIFIED</span>
                        <span id="cmodal-category" class="font-mono-tech text-xs" style="color: var(--text-muted);">Category</span>
                    </div>
                    <h3 id="cmodal-title" class="font-display text-xl sm:text-2xl font-bold mt-1.5">Certificate Title</h3>
                </div>
                <button id="close-cert-modal" type="button"
                        class="w-9 h-9 rounded-full border flex items-center justify-center hover:border-indigo-500 shrink-0"
                        style="border-color: var(--border-strong);" aria-label="Close certificate preview">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

            <!-- High-Resolution Certificate Plaque Preview -->
            <div id="cmodal-plaque-box" class="rounded-2xl border-2 p-6 sm:p-8 mb-6 relative overflow-hidden bg-zinc-950 text-white"
                 style="border-color: #6366F1;">
                <div class="absolute inset-0 opacity-15 pointer-events-none"
                     style="background-image: radial-gradient(#6366F1 1px, transparent 1px); background-size: 20px 20px;"></div>

                <div class="relative z-10 flex flex-col items-center text-center space-y-3 py-2">
                    <div class="w-12 h-12 rounded-full bg-indigo-500/20 border border-indigo-400/40 flex items-center justify-center text-indigo-300 mb-1">
                        <i data-lucide="award" class="w-6 h-6"></i>
                    </div>
                    <div class="font-mono-tech text-[11px] uppercase tracking-[0.25em] text-indigo-300">OFFICIAL CREDENTIAL OF ACHIEVEMENT</div>
                    <p class="text-xs text-zinc-400">This is to certify that</p>
                    <div class="font-display text-2xl sm:text-3xl font-bold tracking-tight text-white border-b border-white/15 pb-2 px-6">
                        {{ $profile['name'] }}
                    </div>
                    <p class="text-xs text-zinc-400 pt-1">has successfully mastered the curriculum and assessment for</p>
                    <h4 id="cmodal-plaque-title" class="font-display text-lg sm:text-xl font-bold text-indigo-200 max-w-lg">
                        Certificate Name
                    </h4>

                    <div class="w-full pt-6 mt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4 text-xs font-mono-tech text-zinc-300">
                        <div class="text-left">
                            <span class="block text-[10px] text-zinc-500">ISSUING AUTHORITY</span>
                            <span id="cmodal-plaque-issuer" class="font-bold text-white">Issuer</span>
                        </div>
                        <div class="text-center">
                            <span class="block text-[10px] text-zinc-500">ISSUE DATE</span>
                            <span id="cmodal-date" class="text-white">2026</span>
                        </div>
                        <div class="text-right">
                            <span class="block text-[10px] text-zinc-500">CREDENTIAL ID</span>
                            <span id="cmodal-credential" class="text-emerald-400 font-bold">ID</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Credential Details & Validated Skills -->
            <div class="space-y-4">
                <div>
                    <div class="text-xs font-mono-tech uppercase tracking-wider mb-1" style="color: var(--text-muted);">Issued By: <span id="cmodal-issuer" class="text-indigo-400 font-semibold"></span></div>
                    <p id="cmodal-desc" class="text-sm leading-relaxed" style="color: var(--text-secondary);"></p>
                </div>

                <div>
                    <div class="text-xs font-mono-tech uppercase tracking-wider mb-2" style="color: var(--text-muted);">Validated Competencies</div>
                    <div id="cmodal-skills" class="flex flex-wrap gap-2"></div>
                </div>

                <div class="pt-4 border-t flex flex-wrap items-center justify-between gap-3" style="border-color: var(--border-hairline);">
                    <button id="copy-credential-btn" type="button" class="btn-editorial-secondary text-xs py-2.5 px-5">
                        <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                        <span>Copy Credential ID</span>
                    </button>
                    <button type="button" onclick="window.print()" class="btn-editorial-primary text-xs py-2.5 px-5">
                        <i data-lucide="printer" class="w-3.5 h-3.5"></i>
                        <span>Print / Save Credential</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
