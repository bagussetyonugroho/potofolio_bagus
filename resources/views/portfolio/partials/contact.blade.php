<section id="contact" class="py-24 lg:py-32 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14 reveal-up">
            <div>
                <div class="badge-pill mb-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>06 // INITIATE COLLABORATION</span>
                </div>
                <h2 class="font-display text-4xl sm:text-6xl font-bold tracking-tight">
                    Let's Work Together
                </h2>
                <p class="text-sm sm:text-base mt-3 max-w-2xl" style="color: var(--text-secondary);">
                    Tertarik untuk berkolaborasi dalam proyek pengembangan web, membutuhkan Frontend / Full-Stack Developer, atau ingin berdiskusi seputar peluang karier? Silakan hubungi saya.
                </p>
            </div>

            <div class="flex items-center gap-2.5 px-4 py-2 rounded-full border font-mono-tech text-xs text-emerald-400 border-emerald-500/30 bg-emerald-500/10">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                <span>AVERAGE RESPONSE TIME: &lt; 2 HOURS</span>
            </div>
        </div>

        <!-- 12-Column Contact Split Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
            <!-- Left 5 Columns: Direct Contact Info Cards & Official Social Media Matrix -->
            <div class="lg:col-span-5 space-y-5 reveal-up">
                <!-- Email Card with Copy Button -->
                <div class="editorial-card p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-xl bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-indigo-400 shrink-0">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <span class="font-mono-tech text-[11px] uppercase tracking-wider block" style="color: var(--text-muted);">Direct Email</span>
                                <a href="mailto:{{ $profile['email'] }}" class="font-display font-bold text-base sm:text-lg hover:text-indigo-400 transition-colors break-all">
                                    {{ $profile['email'] }}
                                </a>
                            </div>
                        </div>

                        <button type="button"
                                data-email="{{ $profile['email'] }}"
                                class="copy-email-trigger px-3 py-1.5 rounded-lg border text-xs font-mono-tech transition hover:border-indigo-500 shrink-0"
                                style="background: var(--bg-secondary); border-color: var(--border-strong);"
                                title="Salin alamat email">
                            Copy
                        </button>
                    </div>
                </div>

                <!-- Location & Timezone Card -->
                <div class="editorial-card p-6">
                    <div class="flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="font-mono-tech text-[11px] uppercase tracking-wider block" style="color: var(--text-muted);">Base Location &amp; Timezone</span>
                            <div class="font-display font-bold text-base sm:text-lg">{{ $profile['location'] }}</div>
                            <div class="text-xs font-mono-tech mt-0.5" style="color: var(--text-secondary);">
                                {{ $profile['coordinates'] }} • {{ $profile['timezone'] }} (Remote Worldwide)
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Official Social Media Directory Card (GitHub, LinkedIn, Instagram, YouTube, TikTok) -->
                <div class="editorial-card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-mono-tech text-xs uppercase tracking-wider" style="color: var(--text-muted);">Official Social Channels</span>
                        <span class="font-mono-tech text-[11px] text-indigo-400">5 Platforms</span>
                    </div>

                    <div class="space-y-2.5">
                        @foreach($socials as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                               class="flex items-center justify-between p-3 rounded-xl border transition-all duration-300 hover:border-indigo-500 hover:translate-x-1 group"
                               style="background: var(--bg-secondary); border-color: var(--border-hairline);">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg flex items-center justify-center border transition-colors group-hover:border-indigo-500 group-hover:text-indigo-400"
                                         style="background: var(--bg-primary); border-color: var(--border-strong);">
                                        @include('portfolio.partials.social-icon', ['icon' => $social['icon'], 'class' => 'w-4 h-4'])
                                    </div>
                                    <div>
                                        <div class="font-display font-bold text-sm">{{ $social['name'] }}</div>
                                        <div class="text-xs font-mono-tech" style="color: var(--text-muted);">{{ $social['handle'] }}</div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] font-mono-tech hidden sm:inline" style="color: var(--text-secondary);">{{ $social['followers'] }}</span>
                                    <i data-lucide="arrow-up-right" class="w-4 h-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" style="color: var(--text-muted);"></i>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right 7 Columns: Professional Contact Form -->
            <div class="lg:col-span-7 reveal-up reveal-delay-1">
                <div class="editorial-card p-6 sm:p-10">
                    <div class="flex items-center justify-between pb-5 mb-6 border-b" style="border-color: var(--border-hairline);">
                        <div>
                            <h3 class="font-display text-xl sm:text-2xl font-bold">Send a Direct Message</h3>
                            <p class="text-xs sm:text-sm mt-1" style="color: var(--text-secondary);">
                                Isi formulir di bawah ini untuk memulai percakapan proyek atau kerja sama.
                            </p>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-indigo-400 shrink-0">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <!-- Feedback Banner after submission -->
                    <div id="contact-feedback-banner" class="hidden mb-6 p-4 rounded-xl border border-emerald-500/40 bg-emerald-500/10"></div>

                    <form id="contact-form" action="{{ route('portfolio.contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="contact-name" class="block text-xs font-mono-tech uppercase tracking-wider mb-2" style="color: var(--text-secondary);">
                                    Your Name <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" id="contact-name" name="name" required maxlength="100"
                                       placeholder="John Doe / Nama Lengkap"
                                       class="input-editorial">
                            </div>

                            <div>
                                <label for="contact-email" class="block text-xs font-mono-tech uppercase tracking-wider mb-2" style="color: var(--text-secondary);">
                                    Email Address <span class="text-rose-500">*</span>
                                </label>
                                <input type="email" id="contact-email" name="email" required maxlength="150"
                                       placeholder="name@company.com"
                                       class="input-editorial">
                            </div>
                        </div>

                        <div>
                            <label for="contact-subject" class="block text-xs font-mono-tech uppercase tracking-wider mb-2" style="color: var(--text-secondary);">
                                Subject / Project Inquiry <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="contact-subject" name="subject" required maxlength="180"
                                   placeholder="Contoh: Web Application Development / Full-Time Role Opportunity"
                                   class="input-editorial">
                        </div>

                        <div>
                            <label for="contact-message" class="block text-xs font-mono-tech uppercase tracking-wider mb-2" style="color: var(--text-secondary);">
                                Project Details or Message <span class="text-rose-500">*</span>
                            </label>
                            <textarea id="contact-message" name="message" rows="5" required minlength="10" maxlength="2000"
                                      placeholder="Ceritakan secara singkat kebutuhan proyek, timeline, atau pesan Anda..."
                                      class="input-editorial"></textarea>
                        </div>

                        <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <span class="text-xs font-mono-tech" style="color: var(--text-muted);">
                                🔒 Data Anda terenkripsi &amp; tersimpan aman.
                            </span>

                            <button id="contact-submit-btn" type="submit" class="btn-editorial-primary py-3.5 px-8 text-sm">
                                <span>Send Message</span>
                                <i data-lucide="send" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ARCHITECTURAL FOOTER -->
<footer class="border-t py-12" style="border-color: var(--border-hairline); background: var(--bg-secondary);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8 pb-8 border-b" style="border-color: var(--border-hairline);">
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-display font-bold text-sm"
                     style="background: var(--invert-bg); color: var(--invert-text);">
                    {{ $profile['initials'] }}<span class="text-indigo-500">.</span>
                </div>
                <div>
                    <div class="font-display font-bold text-base">{{ $profile['name'] }}</div>
                    <div class="text-xs font-mono-tech" style="color: var(--text-muted);">{{ $profile['role_primary'] }}</div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-5 text-xs font-mono-tech" style="color: var(--text-secondary);">
                <a href="#home" class="hover:text-indigo-400 transition-colors">HOME</a>
                <a href="#about" class="hover:text-indigo-400 transition-colors">ABOUT</a>
                <a href="#projects" class="hover:text-indigo-400 transition-colors">PROJECTS</a>
                <a href="#certificates" class="hover:text-indigo-400 transition-colors">CERTIFICATES</a>
                <a href="#tech-stack" class="hover:text-indigo-400 transition-colors">TECH STACK</a>
                <a href="#comments" class="hover:text-indigo-400 transition-colors">COMMENTS</a>
                <a href="{{ route('portfolio.cv') }}" target="_blank" class="hover:text-indigo-400 transition-colors">DOWNLOAD CV</a>
            </div>
        </div>

        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-mono-tech" style="color: var(--text-muted);">
            <div>
                &copy; {{ date('Y') }} {{ $profile['name'] }}. Crafted with Laravel 12, Blade, Tailwind CSS &amp; Editorial Precision.
            </div>
            <div class="flex items-center gap-3">
                @foreach($socials as $social)
                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                       class="hover:text-indigo-400 transition-colors" aria-label="{{ $social['name'] }}">
                        @include('portfolio.partials.social-icon', ['icon' => $social['icon'], 'class' => 'w-4 h-4'])
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
