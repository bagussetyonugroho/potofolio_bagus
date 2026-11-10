@php
    $avatarGradients = [
        'indigo' => 'from-indigo-500 to-blue-600',
        'emerald' => 'from-emerald-500 to-teal-600',
        'violet' => 'from-violet-500 to-purple-600',
        'amber' => 'from-amber-500 to-orange-600',
        'rose' => 'from-rose-500 to-pink-600',
        'cyan' => 'from-cyan-500 to-sky-600',
    ];
@endphp

<section id="comments" class="py-24 lg:py-32 border-b relative" style="border-color: var(--border-hairline);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14 reveal-up">
            <div>
                <div class="badge-pill mb-4">
                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    <span>05 // VISITOR GUESTBOOK &amp; TESTIMONIALS</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-bold tracking-tight">
                    Community &amp; Visitor Comments
                </h2>
                <p class="text-sm sm:text-base mt-3 max-w-2xl" style="color: var(--text-secondary);">
                    Tinggalkan kesan, pesan, apresiasi, atau diskusi singkat Anda. Seluruh komentar tersimpan secara real-time di dalam basis data.
                </p>
            </div>

            <div class="flex items-center gap-2.5 px-4 py-2 rounded-full border font-mono-tech text-xs"
                 style="background: var(--bg-secondary); border-color: var(--border-strong);">
                <i data-lucide="message-square" class="w-4 h-4 text-indigo-400"></i>
                <span>Total Comments: <strong class="total-comments-count">{{ count($comments) }}</strong></span>
            </div>
        </div>

        <!-- 12-Column Guestbook Layout: Left Form (5 Cols), Right Comment Cards Feed (7 Cols) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
            <!-- Left 5 Columns: Leave a Comment Form -->
            <div class="lg:col-span-5 lg:sticky lg:top-28 reveal-up">
                <div class="editorial-card p-6 sm:p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-9 h-9 rounded-xl bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-indigo-400">
                            <i data-lucide="pen-line" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <h3 class="font-display text-lg font-bold">Tulis Komentar</h3>
                            <p class="text-xs" style="color: var(--text-muted);">Bagikan tanggapan Anda di Guestbook</p>
                        </div>
                    </div>

                    <form id="guestbook-form" action="{{ route('portfolio.comments.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="comment-name" class="block text-xs font-mono-tech uppercase tracking-wider mb-1.5" style="color: var(--text-secondary);">
                                Nama Pengunjung <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="comment-name" name="name" required maxlength="80"
                                   placeholder="Contoh: Budi Santoso"
                                   class="input-editorial">
                        </div>

                        <div>
                            <label for="comment-role" class="block text-xs font-mono-tech uppercase tracking-wider mb-1.5" style="color: var(--text-secondary);">
                                Profesi / Peran <span class="text-[10px]" style="color: var(--text-muted);">(Opsional)</span>
                            </label>
                            <input type="text" id="comment-role" name="role" maxlength="80"
                                   placeholder="Contoh: Frontend Engineer / Recruiter / Visitor"
                                   class="input-editorial">
                        </div>

                        <!-- Avatar Badge Color Selector -->
                        <div>
                            <label class="block text-xs font-mono-tech uppercase tracking-wider mb-2" style="color: var(--text-secondary);">
                                Warna Avatar
                            </label>
                            <input type="hidden" id="comment-avatar-color" name="avatar_color" value="indigo">
                            <div class="flex items-center gap-2.5">
                                @foreach($avatarGradients as $colorKey => $gradClass)
                                    <button type="button"
                                            data-color="{{ $colorKey }}"
                                            class="avatar-color-choice w-7 h-7 rounded-full bg-gradient-to-br {{ $gradClass }} transition transform {{ $colorKey === 'indigo' ? 'ring-2 ring-white scale-110' : 'opacity-80 hover:opacity-100' }}"
                                            aria-label="Pilih warna avatar {{ $colorKey }}"></button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="comment-content" class="block text-xs font-mono-tech uppercase tracking-wider" style="color: var(--text-secondary);">
                                    Isi Komentar <span class="text-rose-500">*</span>
                                </label>
                                <span id="comment-char-count" class="text-[11px] font-mono-tech" style="color: var(--text-muted);">0 / 600</span>
                            </div>
                            <textarea id="comment-content" name="content" rows="4" required minlength="3" maxlength="600"
                                      placeholder="Tulis kesan atau komentar Anda mengenai portfolio ini..."
                                      class="input-editorial"></textarea>
                        </div>

                        <button id="comment-submit-btn" type="submit" class="btn-editorial-primary w-full py-3 text-sm">
                            <i data-lucide="send" class="w-4 h-4"></i>
                            <span>Kirim Komentar</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right 7 Columns: Clean Comment Cards Feed -->
            <div class="lg:col-span-7">
                <div id="comments-list-container" class="space-y-4">
                    @forelse($comments as $comment)
                        @php
                            $grad = $avatarGradients[$comment->avatar_color] ?? $avatarGradients['indigo'];
                        @endphp
                        <article class="editorial-card p-6 reveal-up">
                            <div class="flex items-start justify-between gap-4 mb-3.5">
                                <div class="flex items-center gap-3.5">
                                    <!-- Visitor Avatar with Gradient & Initials -->
                                    <div class="w-11 h-11 rounded-full bg-gradient-to-br {{ $grad }} flex items-center justify-center text-white font-display font-bold text-sm shadow-md shrink-0">
                                        {{ $comment->initials }}
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <h4 class="font-display font-bold text-base">{{ $comment->name }}</h4>
                                            @if($comment->is_pinned)
                                                <span class="px-2 py-0.5 text-[10px] font-mono-tech uppercase rounded-full bg-indigo-500/15 text-indigo-400 border border-indigo-500/30">
                                                    ★ Pinned
                                                </span>
                                            @endif
                                        </div>
                                        <p class="text-xs" style="color: var(--text-muted);">{{ $comment->role }}</p>
                                    </div>
                                </div>

                                <span class="text-xs font-mono-tech shrink-0" style="color: var(--text-muted);">
                                    {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Baru saja' }}
                                </span>
                            </div>

                            <p class="text-sm leading-relaxed mb-4" style="color: var(--text-secondary);">
                                {{ $comment->content }}
                            </p>

                            <div class="flex items-center justify-between pt-3 border-t" style="border-color: var(--border-hairline);">
                                <span class="text-[11px] font-mono-tech" style="color: var(--text-muted);">
                                    {{ $comment->created_at ? $comment->created_at->translatedFormat('d M Y • H:i') : now()->translatedFormat('d M Y') }}
                                </span>

                                <button type="button"
                                        data-comment-id="{{ $comment->id }}"
                                        class="like-comment-btn inline-flex items-center gap-1.5 text-xs font-mono-tech px-3 py-1 rounded-full border transition hover:border-indigo-500"
                                        style="border-color: var(--border-hairline); color: var(--text-secondary);">
                                    <span>♥</span>
                                    <span class="like-count">{{ $comment->likes }}</span>
                                </button>
                            </div>
                        </article>
                    @empty
                        <div class="editorial-card p-8 text-center">
                            <p class="text-sm" style="color: var(--text-secondary);">Belum ada komentar. Jadilah pengunjung pertama yang mengisi Guestbook!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
