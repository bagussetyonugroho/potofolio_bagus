<header id="navbar-shell" class="navbar-shell px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <nav class="navbar-pill rounded-full px-4 sm:px-6 py-2.5 flex items-center justify-between gap-4" aria-label="Primary Navigation">
            <!-- Personal Brand Monogram & Name -->
            <a href="#home" class="flex items-center gap-3 group shrink-0">
                <div class="w-9 h-9 rounded-full flex items-center justify-center font-display font-bold text-xs tracking-wider border transition-transform duration-300 group-hover:scale-105"
                     style="background: var(--invert-bg); color: var(--invert-text); border-color: var(--border-strong);">
                    {{ $profile['initials'] }}<span class="text-indigo-500">.</span>
                </div>
                <div class="hidden sm:block">
                    <span class="font-display font-bold text-sm tracking-tight block leading-none">{{ $profile['short_name'] }}</span>
                    <span class="font-mono-tech text-[10px] tracking-widest uppercase block mt-0.5" style="color: var(--text-muted);">DEV // PORTFOLIO</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden lg:flex items-center gap-1">
                <a href="#home" class="nav-link-item active">Home</a>
                <a href="#about" class="nav-link-item">About</a>
                <a href="#projects" class="nav-link-item">Projects</a>
                <a href="#certificates" class="nav-link-item">Certificates</a>
                <a href="#tech-stack" class="nav-link-item">Tech Stack</a>
                <a href="#comments" class="nav-link-item">Comments</a>
                <a href="#contact" class="nav-link-item">Contact</a>
            </div>

            <!-- Right Actions: Theme Switcher + Let's Talk / CV -->
            <div class="hidden lg:flex items-center gap-2.5">
                <button id="theme-toggle-btn" type="button"
                        class="w-9 h-9 rounded-full flex items-center justify-center border transition hover:border-indigo-500"
                        style="border-color: var(--border-hairline); background: var(--bg-secondary); color: var(--text-primary);"
                        aria-label="Toggle Dark/Light Theme" title="Toggle Dark / Light Contrast">
                    <i data-lucide="sun" class="w-4 h-4 theme-icon-sun"></i>
                    <i data-lucide="moon" class="w-4 h-4 theme-icon-moon" style="display:none;"></i>
                </button>

                <a href="{{ route('portfolio.cv') }}" target="_blank"
                   class="px-3.5 py-2 rounded-full text-xs font-mono-tech font-medium border transition hover:border-indigo-500 flex items-center gap-1.5"
                   style="border-color: var(--border-strong); color: var(--text-primary);">
                    <i data-lucide="file-text" class="w-3.5 h-3.5 text-indigo-400"></i>
                    <span>CV</span>
                </a>

                <a href="#contact"
                   class="px-4 py-2 rounded-full text-xs font-semibold transition flex items-center gap-1.5"
                   style="background: var(--invert-bg); color: var(--invert-text);">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Hire Me</span>
                </a>
            </div>

            <!-- Mobile Controls (Theme + Hamburger Button) -->
            <div class="flex lg:hidden items-center gap-2">
                <button id="theme-toggle-mobile" type="button"
                        class="w-9 h-9 rounded-full flex items-center justify-center border"
                        style="border-color: var(--border-hairline); background: var(--bg-secondary); color: var(--text-primary);"
                        aria-label="Toggle Theme">
                    <i data-lucide="sun" class="w-4 h-4 theme-icon-sun"></i>
                    <i data-lucide="moon" class="w-4 h-4 theme-icon-moon" style="display:none;"></i>
                </button>

                <button id="mobile-menu-btn" type="button"
                        class="w-9 h-9 rounded-full flex items-center justify-center border"
                        style="border-color: var(--border-strong); background: var(--bg-secondary); color: var(--text-primary);"
                        aria-expanded="false" aria-label="Open Navigation Menu">
                    <i data-lucide="menu" class="w-4 h-4"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-menu-drawer" class="hidden lg:hidden mt-2 rounded-2xl p-5 border shadow-2xl"
             style="background: var(--bg-card-solid); border-color: var(--border-strong);">
            <div class="flex flex-col space-y-1.5">
                <a href="#home" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">Home</a>
                <a href="#about" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">About Me</a>
                <a href="#projects" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">Projects</a>
                <a href="#certificates" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">Certificates</a>
                <a href="#tech-stack" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">Tech Stack</a>
                <a href="#comments" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">Comments</a>
                <a href="#contact" class="mobile-nav-link nav-link-item block py-2.5 px-4 rounded-xl">Contact</a>
            </div>
            <div class="mt-4 pt-4 border-t flex items-center gap-3" style="border-color: var(--border-hairline);">
                <a href="{{ route('portfolio.cv') }}" target="_blank" class="btn-editorial-secondary flex-1 text-center text-xs py-2.5">
                    <i data-lucide="download" class="w-3.5 h-3.5"></i>
                    <span>Download CV</span>
                </a>
                <a href="#contact" class="btn-editorial-primary flex-1 text-center text-xs py-2.5">
                    <span>Let's Work</span>
                </a>
            </div>
        </div>
    </div>
</header>
