<header id="navbar-shell" class="navbar-shell">
    <div class="w-[93.5%] max-w-[1680px] mx-auto">
        <nav class="navbar-pill rounded-full px-7 sm:px-10 py-3.5 flex items-center justify-between gap-4" aria-label="Primary Navigation">
            <!-- Personal Brand Monospace Handle -->
            <a href="#home" class="font-mono-tech text-xs sm:text-[13px] tracking-[0.08em] text-zinc-300 hover:text-white transition shrink-0">
                bagus.dev
            </a>

            <!-- Desktop Navigation Links (Right-Aligned like Image 2) -->
            <div class="hidden md:flex items-center gap-8 lg:gap-11 xl:gap-12 pr-1">
                <a href="#home" class="nav-link-item active">Home</a>
                <a href="#about" class="nav-link-item">About</a>
                <a href="#projects" class="nav-link-item">Portfolio</a>
                <a href="#contact" class="nav-link-item">Contact</a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden items-center gap-2">
                <button id="mobile-menu-btn" type="button"
                        class="w-9 h-9 rounded-full flex items-center justify-center border border-white/15 bg-zinc-900/80 text-zinc-200"
                        aria-expanded="false" aria-label="Open Navigation Menu">
                    <i data-lucide="menu" class="w-4 h-4"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-menu-drawer" class="hidden md:hidden mt-2 rounded-2xl p-5 border shadow-2xl"
             style="background: var(--bg-card-solid); border-color: var(--border-strong);">
            <div class="flex flex-col space-y-2">
                <a href="#home" class="mobile-nav-link font-mono-tech text-xs text-zinc-200 hover:text-white block py-2 px-3 rounded-lg">Home</a>
                <a href="#about" class="mobile-nav-link font-mono-tech text-xs text-zinc-400 hover:text-white block py-2 px-3 rounded-lg">About</a>
                <a href="#projects" class="mobile-nav-link font-mono-tech text-xs text-zinc-400 hover:text-white block py-2 px-3 rounded-lg">Portfolio</a>
                <a href="#certificates" class="mobile-nav-link font-mono-tech text-xs text-zinc-400 hover:text-white block py-2 px-3 rounded-lg">Certificates</a>
                <a href="#tech-stack" class="mobile-nav-link font-mono-tech text-xs text-zinc-400 hover:text-white block py-2 px-3 rounded-lg">Tech Stack</a>
                <a href="#comments" class="mobile-nav-link font-mono-tech text-xs text-zinc-400 hover:text-white block py-2 px-3 rounded-lg">Comments</a>
                <a href="#contact" class="mobile-nav-link font-mono-tech text-xs text-zinc-400 hover:text-white block py-2 px-3 rounded-lg">Contact</a>
            </div>
        </div>
    </div>
</header>
