/**
 * PREMIUM DEVELOPER PORTFOLIO — INTERACTIVE FRONTEND ENGINE
 */

document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons if loaded
    if (window.lucide) {
        window.lucide.createIcons();
    }

    /* ======================================================================
       1. PAGE LOADING PRELOADER
       ====================================================================== */
    const preloader = document.getElementById('page-preloader');
    const preloaderCount = document.getElementById('preloader-count');
    const preloaderBar = document.getElementById('preloader-bar');

    if (preloader) {
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.floor(Math.random() * 18) + 12;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                setTimeout(() => {
                    preloader.classList.add('loaded');
                }, 180);
            }
            if (preloaderCount) preloaderCount.textContent = String(progress).padStart(2, '0') + '%';
            if (preloaderBar) preloaderBar.style.width = progress + '%';
        }, 55);
    }

    /* ======================================================================
       2. DARK & LIGHT CONTRAST THEME TOGGLE
       ====================================================================== */
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');
    const rootHtml = document.documentElement;

    const savedTheme = localStorage.getItem('portfolio_theme') || 'dark';
    rootHtml.setAttribute('data-theme', savedTheme);
    updateThemeIcons(savedTheme);

    function toggleTheme() {
        const current = rootHtml.getAttribute('data-theme') === 'light' ? 'light' : 'dark';
        const next = current === 'dark' ? 'light' : 'dark';
        rootHtml.setAttribute('data-theme', next);
        localStorage.setItem('portfolio_theme', next);
        updateThemeIcons(next);
        showToast(next === 'light' ? 'Switched to Editorial Light Mode' : 'Switched to Obsidian Dark Mode');
    }

    function updateThemeIcons(theme) {
        document.querySelectorAll('.theme-icon-sun').forEach(el => {
            el.style.display = theme === 'dark' ? 'block' : 'none';
        });
        document.querySelectorAll('.theme-icon-moon').forEach(el => {
            el.style.display = theme === 'light' ? 'block' : 'none';
        });
    }

    if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);
    if (themeToggleMobileBtn) themeToggleMobileBtn.addEventListener('click', toggleTheme);

    /* ======================================================================
       3. STICKY NAVBAR, MOBILE DRAWER & ACTIVE SCROLL SPY
       ====================================================================== */
    const navbarShell = document.getElementById('navbar-shell');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenuDrawer = document.getElementById('mobile-menu-drawer');
    const navLinks = document.querySelectorAll('.nav-link-item, .mobile-nav-link');
    const sections = document.querySelectorAll('section[id]');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 30) {
            navbarShell?.classList.add('scrolled');
        } else {
            navbarShell?.classList.remove('scrolled');
        }
        updateScrollProgress();
    }, { passive: true });

    if (mobileMenuBtn && mobileMenuDrawer) {
        mobileMenuBtn.addEventListener('click', () => {
            const isHidden = mobileMenuDrawer.classList.contains('hidden');
            if (isHidden) {
                mobileMenuDrawer.classList.remove('hidden');
                mobileMenuBtn.setAttribute('aria-expanded', 'true');
            } else {
                mobileMenuDrawer.classList.add('hidden');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
            }
        });

        mobileMenuDrawer.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuDrawer.classList.add('hidden');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Active section indicator via IntersectionObserver
    const spyObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const activeId = entry.target.getAttribute('id');
                navLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href === '#' + activeId) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }
        });
    }, {
        rootMargin: '-28% 0px -55% 0px',
        threshold: 0
    });

    sections.forEach(sec => spyObserver.observe(sec));

    /* ======================================================================
       4. HERO TYPING TEXT ANIMATION
       ====================================================================== */
    const typingTarget = document.getElementById('hero-typing-text');
    if (typingTarget) {
        let roles = [];
        try {
            roles = JSON.parse(typingTarget.getAttribute('data-roles') || '[]');
        } catch (e) {
            roles = ['Frontend Developer', 'Full-Stack Web Engineer', 'UI/UX Specialist'];
        }

        if (roles.length > 0) {
            let roleIdx = 0;
            let charIdx = roles[0].length;
            let isDeleting = true;

            const typeLoop = () => {
                const currentRole = roles[roleIdx];
                if (isDeleting) {
                    charIdx--;
                    typingTarget.textContent = currentRole.substring(0, charIdx);
                } else {
                    charIdx++;
                    typingTarget.textContent = currentRole.substring(0, charIdx);
                }

                let speed = isDeleting ? 35 : 70;

                if (!isDeleting && charIdx === currentRole.length) {
                    speed = 2800; // Pause at full word
                    isDeleting = true;
                } else if (isDeleting && charIdx === 0) {
                    isDeleting = false;
                    roleIdx = (roleIdx + 1) % roles.length;
                    speed = 350;
                }

                setTimeout(typeLoop, speed);
            };

            setTimeout(typeLoop, 3500);
        }
    }

    /* ======================================================================
       5. SCROLL REVEAL & ANIMATED BENTO STATISTIC COUNTERS
       ====================================================================== */
    const revealElements = document.querySelectorAll('.reveal-up');
    const revealObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    revealElements.forEach(el => revealObserver.observe(el));

    const statCounters = document.querySelectorAll('.stat-counter');
    const counterObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target') || '0', 10);
                const suffix = el.getAttribute('data-suffix') || '';
                const duration = 1400;
                const startTime = performance.now();

                const updateCount = (now) => {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const currentVal = Math.floor(eased * target);
                    el.textContent = currentVal + suffix;
                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        el.textContent = target + suffix;
                    }
                };

                requestAnimationFrame(updateCount);
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.4 });

    statCounters.forEach(c => counterObserver.observe(c));

    /* ======================================================================
       6. MOUSE SPOTLIGHT ON CARDS & CUSTOM MAGNETIC CURSOR
       ====================================================================== */
    function bindSpotlightCards() {
        document.querySelectorAll('.editorial-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });
    }
    bindSpotlightCards();

    const cursorDot = document.getElementById('cursor-dot');
    const cursorRing = document.getElementById('cursor-ring');

    if (cursorDot && cursorRing && window.matchMedia('(pointer: fine)').matches) {
        let mouseX = window.innerWidth / 2;
        let mouseY = window.innerHeight / 2;
        let ringX = mouseX;
        let ringY = mouseY;

        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            cursorDot.style.left = `${mouseX}px`;
            cursorDot.style.top = `${mouseY}px`;
        }, { passive: true });

        const renderCursor = () => {
            ringX += (mouseX - ringX) * 0.18;
            ringY += (mouseY - ringY) * 0.18;
            cursorRing.style.left = `${ringX}px`;
            cursorRing.style.top = `${ringY}px`;
            requestAnimationFrame(renderCursor);
        };
        requestAnimationFrame(renderCursor);

        document.querySelectorAll('a, button, input, textarea, [data-cursor-hover]').forEach(el => {
            el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
            el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
        });
    }

    /* ======================================================================
       7. PROJECT SHOWCASE CATEGORY FILTER & QUICK PREVIEW MODAL
       ====================================================================== */
    const projectFilterBtns = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card-item');

    projectFilterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const category = btn.getAttribute('data-filter');
            projectFilterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            projectCards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (category === 'all' || cardCat === category) {
                    card.style.display = '';
                    requestAnimationFrame(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    });
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(12px)';
                    setTimeout(() => {
                        if (btn.classList.contains('active') && category !== 'all' && cardCat !== category) {
                            card.style.display = 'none';
                        }
                    }, 220);
                }
            });
        });
    });

    // Project Interactive Preview Modal
    const projectModal = document.getElementById('project-preview-modal');
    const closeProjectModalBtn = document.getElementById('close-project-modal');

    document.querySelectorAll('.open-project-modal-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const title = btn.getAttribute('data-title');
            const category = btn.getAttribute('data-category');
            const year = btn.getAttribute('data-year');
            const desc = btn.getAttribute('data-desc');
            const metrics = btn.getAttribute('data-metrics');
            const tech = JSON.parse(btn.getAttribute('data-tech') || '[]');
            const highlights = JSON.parse(btn.getAttribute('data-highlights') || '[]');
            const liveUrl = btn.getAttribute('data-live');
            const repoUrl = btn.getAttribute('data-repo');

            document.getElementById('pmodal-title').textContent = title;
            document.getElementById('pmodal-category').textContent = `${category} // ${year}`;
            document.getElementById('pmodal-desc').textContent = desc;
            document.getElementById('pmodal-metrics').textContent = metrics;
            document.getElementById('pmodal-live-link').setAttribute('href', liveUrl);
            document.getElementById('pmodal-repo-link').setAttribute('href', repoUrl);

            const highlightsList = document.getElementById('pmodal-highlights');
            highlightsList.innerHTML = highlights.map(h => `
                <li class="flex items-start gap-2.5 text-sm" style="color: var(--text-secondary);">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-indigo-500 mt-2 shrink-0"></span>
                    <span>${h}</span>
                </li>
            `).join('');

            const techList = document.getElementById('pmodal-tech');
            techList.innerHTML = tech.map(t => `
                <span class="px-3 py-1 rounded-full text-xs font-mono-tech border" style="border-color: var(--border-strong); background: var(--bg-secondary);">
                    ${t}
                </span>
            `).join('');

            projectModal?.classList.add('open');
            document.body.style.overflow = 'hidden';
        });
    });

    closeProjectModalBtn?.addEventListener('click', () => {
        projectModal?.classList.remove('open');
        document.body.style.overflow = '';
    });

    projectModal?.addEventListener('click', (e) => {
        if (e.target === projectModal) {
            projectModal.classList.remove('open');
            document.body.style.overflow = '';
        }
    });

    /* ======================================================================
       8. CERTIFICATES MODAL LIGHTBOX PREVIEW
       ====================================================================== */
    const certModal = document.getElementById('certificate-modal');
    const closeCertModalBtn = document.getElementById('close-cert-modal');
    const copyCredentialBtn = document.getElementById('copy-credential-btn');

    document.querySelectorAll('.open-cert-modal').forEach(trigger => {
        trigger.addEventListener('click', () => {
            const title = trigger.getAttribute('data-title');
            const issuer = trigger.getAttribute('data-issuer');
            const badge = trigger.getAttribute('data-badge');
            const date = trigger.getAttribute('data-date');
            const credential = trigger.getAttribute('data-credential');
            const category = trigger.getAttribute('data-category');
            const desc = trigger.getAttribute('data-desc');
            const accent = trigger.getAttribute('data-accent') || '#6366F1';
            const skills = JSON.parse(trigger.getAttribute('data-skills') || '[]');

            document.getElementById('cmodal-title').textContent = title;
            document.getElementById('cmodal-plaque-title').textContent = title;
            document.getElementById('cmodal-issuer').textContent = issuer;
            document.getElementById('cmodal-plaque-issuer').textContent = issuer;
            document.getElementById('cmodal-badge').textContent = badge;
            document.getElementById('cmodal-date').textContent = date;
            document.getElementById('cmodal-credential').textContent = credential;
            document.getElementById('cmodal-category').textContent = category;
            document.getElementById('cmodal-desc').textContent = desc;

            const plaqueBox = document.getElementById('cmodal-plaque-box');
            if (plaqueBox) {
                plaqueBox.style.borderColor = accent;
            }

            const skillsContainer = document.getElementById('cmodal-skills');
            if (skillsContainer) {
                skillsContainer.innerHTML = skills.map(s => `
                    <span class="px-3 py-1 rounded-full text-xs font-mono-tech border" style="border-color: var(--border-strong); background: var(--bg-secondary);">
                        ${s}
                    </span>
                `).join('');
            }

            certModal?.classList.add('open');
            document.body.style.overflow = 'hidden';
        });
    });

    closeCertModalBtn?.addEventListener('click', () => {
        certModal?.classList.remove('open');
        document.body.style.overflow = '';
    });

    certModal?.addEventListener('click', (e) => {
        if (e.target === certModal) {
            certModal.classList.remove('open');
            document.body.style.overflow = '';
        }
    });

    copyCredentialBtn?.addEventListener('click', () => {
        const cred = document.getElementById('cmodal-credential')?.textContent || '';
        if (cred && navigator.clipboard) {
            navigator.clipboard.writeText(cred);
            showToast(`Credential ID ${cred} disalin ke clipboard!`);
        }
    });

    // Close modals with Escape key
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            certModal?.classList.remove('open');
            projectModal?.classList.remove('open');
            document.body.style.overflow = '';
        }
    });

    /* ======================================================================
       9. TECH STACK GROUP FILTER
       ====================================================================== */
    const stackFilterBtns = document.querySelectorAll('.stack-filter-btn');
    const stackGroups = document.querySelectorAll('.stack-group-block');

    stackFilterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetGroup = btn.getAttribute('data-stack-group');
            stackFilterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            stackGroups.forEach(group => {
                const groupName = group.getAttribute('data-group-name');
                if (targetGroup === 'all' || groupName === targetGroup) {
                    group.style.display = '';
                } else {
                    group.style.display = 'none';
                }
            });
        });
    });

    /* ======================================================================
       10. COMMENTS (GUESTBOOK) AJAX SUBMISSION & LIKES
       ====================================================================== */
    const commentForm = document.getElementById('guestbook-form');
    const commentTextarea = document.getElementById('comment-content');
    const commentCharCount = document.getElementById('comment-char-count');
    const commentsList = document.getElementById('comments-list-container');
    const totalCommentsBadges = document.querySelectorAll('.total-comments-count');

    if (commentTextarea && commentCharCount) {
        commentTextarea.addEventListener('input', () => {
            commentCharCount.textContent = `${commentTextarea.value.length} / 600`;
        });
    }

    // Avatar color picker
    const colorChoices = document.querySelectorAll('.avatar-color-choice');
    const avatarColorInput = document.getElementById('comment-avatar-color');

    colorChoices.forEach(btn => {
        btn.addEventListener('click', () => {
            const color = btn.getAttribute('data-color');
            if (avatarColorInput) avatarColorInput.value = color;
            colorChoices.forEach(b => b.classList.remove('ring-2', 'ring-white', 'scale-110'));
            btn.classList.add('ring-2', 'ring-white', 'scale-110');
        });
    });

    const colorMap = {
        indigo: 'from-indigo-500 to-blue-600',
        emerald: 'from-emerald-500 to-teal-600',
        violet: 'from-violet-500 to-purple-600',
        amber: 'from-amber-500 to-orange-600',
        rose: 'from-rose-500 to-pink-600',
        cyan: 'from-cyan-500 to-sky-600',
    };

    if (commentForm) {
        commentForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = document.getElementById('comment-submit-btn');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Mengirim Komentar...</span>';

            const formData = new FormData(commentForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            try {
                const response = await fetch(commentForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: formData,
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    const c = result.comment;
                    const grad = colorMap[c.avatar_color] || colorMap.indigo;

                    const newCard = document.createElement('article');
                    newCard.className = 'editorial-card p-6 transition-all duration-500';
                    newCard.innerHTML = `
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-full bg-gradient-to-br ${grad} flex items-center justify-center text-white font-display font-bold text-sm shadow-md shrink-0">
                                    ${escapeHtml(c.initials)}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h4 class="font-display font-bold text-base">${escapeHtml(c.name)}</h4>
                                        <span class="px-2 py-0.5 text-[10px] font-mono-tech uppercase rounded-full bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">New</span>
                                    </div>
                                    <p class="text-xs" style="color: var(--text-muted);">${escapeHtml(c.role)}</p>
                                </div>
                            </div>
                            <span class="text-xs font-mono-tech shrink-0" style="color: var(--text-muted);">${escapeHtml(c.time_ago)}</span>
                        </div>
                        <p class="text-sm leading-relaxed mb-4" style="color: var(--text-secondary);">${escapeHtml(c.content)}</p>
                        <div class="flex items-center justify-between pt-3 border-t" style="border-color: var(--border-hairline);">
                            <span class="text-[11px] font-mono-tech" style="color: var(--text-muted);">${escapeHtml(c.date_formatted)}</span>
                            <button type="button" data-comment-id="${c.id}" class="like-comment-btn inline-flex items-center gap-1.5 text-xs font-mono-tech px-2.5 py-1 rounded-full border transition hover:border-indigo-500" style="border-color: var(--border-hairline); color: var(--text-secondary);">
                                <span>♥</span>
                                <span class="like-count">${c.likes}</span>
                            </button>
                        </div>
                    `;

                    if (commentsList) {
                        commentsList.prepend(newCard);
                        bindSpotlightCards();
                        bindLikeButtons();
                    }

                    totalCommentsBadges.forEach(b => {
                        b.textContent = result.total_comments;
                    });

                    commentForm.reset();
                    if (commentCharCount) commentCharCount.textContent = '0 / 600';
                    showToast(result.message || 'Komentar berhasil dikirim!');
                } else {
                    const errMsg = result.message || 'Mohon periksa kembali isian komentar Anda.';
                    showToast(errMsg, 'error');
                }
            } catch (err) {
                showToast('Terjadi kesalahan jaringan, silakan coba lagi.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });
    }

    function bindLikeButtons() {
        document.querySelectorAll('.like-comment-btn:not([data-bound])').forEach(btn => {
            btn.setAttribute('data-bound', 'true');
            btn.addEventListener('click', async () => {
                const commentId = btn.getAttribute('data-comment-id');
                const countSpan = btn.querySelector('.like-count');
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                try {
                    const res = await fetch(`/comments/${commentId}/like`, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        }
                    });
                    const data = await res.json();
                    if (res.ok && data.likes !== undefined) {
                        if (countSpan) countSpan.textContent = data.likes;
                        btn.classList.add('border-indigo-500', 'text-indigo-400');
                    }
                } catch (e) {
                    // ignore
                }
            });
        });
    }
    bindLikeButtons();

    /* ======================================================================
       11. CONTACT FORM AJAX SUBMISSION & COPY EMAIL
       ====================================================================== */
    const contactForm = document.getElementById('contact-form');
    const contactFeedback = document.getElementById('contact-feedback-banner');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = document.getElementById('contact-submit-btn');
            const originalHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Mengirim Pesan...</span>';

            const formData = new FormData(contactForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            try {
                const response = await fetch(contactForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: formData,
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    contactForm.reset();
                    if (contactFeedback) {
                        contactFeedback.classList.remove('hidden');
                        contactFeedback.innerHTML = `
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="font-semibold text-sm text-emerald-400">✓ Pesan Terkirim (${escapeHtml(result.reference_id || 'VERIFIED')})</p>
                                    <p class="text-xs mt-1" style="color: var(--text-secondary);">${escapeHtml(result.message)}</p>
                                </div>
                            </div>
                        `;
                    }
                    showToast(result.message || 'Pesan Anda berhasil dikirim!');
                } else {
                    showToast(result.message || 'Mohon lengkapi seluruh kolom formulir.', 'error');
                }
            } catch (err) {
                showToast('Gagal mengirim pesan, silakan coba lagi.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHtml;
            }
        });
    }

    // Copy email buttons
    document.querySelectorAll('.copy-email-trigger').forEach(btn => {
        btn.addEventListener('click', () => {
            const email = btn.getAttribute('data-email') || 'rifqi.aliya.dev@gmail.com';
            if (navigator.clipboard) {
                navigator.clipboard.writeText(email);
            }
            showToast(`Alamat email ${email} berhasil disalin!`);
        });
    });

    /* ======================================================================
       12. BACK TO TOP WITH SCROLL PROGRESS RING
       ====================================================================== */
    const backToTopBtn = document.getElementById('back-to-top');
    const progressCircle = document.getElementById('scroll-progress-circle');

    function updateScrollProgress() {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) : 0;

        if (scrollTop > 420) {
            backToTopBtn?.classList.add('visible');
        } else {
            backToTopBtn?.classList.remove('visible');
        }

        if (progressCircle) {
            const circumference = 138;
            const offset = circumference - (scrollPercent * circumference);
            progressCircle.style.strokeDashoffset = String(offset);
        }
    }

    backToTopBtn?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    /* ======================================================================
       13. TOAST NOTIFICATION HELPER
       ====================================================================== */
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        const borderColor = type === 'error' ? 'border-rose-500/50' : 'border-emerald-500/40';
        const dotColor = type === 'error' ? 'bg-rose-500' : 'bg-emerald-400';

        toast.className = `flex items-center gap-3 px-4 py-3 rounded-xl border ${borderColor} shadow-2xl backdrop-blur-xl transition-all duration-300 transform translate-y-2 opacity-0`;
        toast.style.background = 'var(--bg-card-solid)';
        toast.style.color = 'var(--text-primary)';
        toast.innerHTML = `
            <span class="w-2 h-2 rounded-full ${dotColor} shrink-0"></span>
            <span class="text-xs font-medium">${escapeHtml(message)}</span>
        `;

        container.appendChild(toast);
        requestAnimationFrame(() => {
            toast.classList.remove('translate-y-2', 'opacity-0');
        });

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 3600);
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str || '';
        return div.innerHTML;
    }
});
