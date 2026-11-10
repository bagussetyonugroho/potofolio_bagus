<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ContactMessage;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PortfolioController extends Controller
{
    /**
     * Get the complete portfolio dataset for Bagus Setyo Nugroho.
     */
    private function getPortfolioData(): array
    {
        return [
            'profile' => [
                'greeting' => "Hello, I'm",
                'name' => 'Bagus Setyo Nugroho',
                'short_name' => 'Bagus Setyo N.',
                'initials' => 'BSN',
                'role_primary' => 'Informatics Student | Aspiring Software Developer',
                'institution' => 'Universitas Internasional Semen Indonesia (UISI)',
                'study_program' => 'Informatika',
                'semester' => 'Semester 5',
                'hero_subtitle' => 'Informatics Student at Universitas Internasional Semen Indonesia (UISI).',
                'typing_roles' => [
                    'Informatics Student',
                    'Web Developer Enthusiast',
                    'Software Development Enthusiast',
                    'UI/UX Design Enthusiast',
                    'Technology & Digital Innovation Enthusiast',
                ],
                'professional_identities' => [
                    'Informatics Student',
                    'Web Developer Enthusiast',
                    'Software Development Enthusiast',
                    'UI/UX Design Enthusiast',
                    'Technology & Digital Innovation Enthusiast',
                ],
                'tagline' => 'Turning Ideas Into Digital Experiences.',
                'short_intro' => 'A 5th-semester Informatics student at Universitas Internasional Semen Indonesia, passionate about technology, programming, and creating innovative digital experiences.',
                'description' => "I'm a passionate Informatics student who is interested in technology, software development, web development, and digital innovation.",
                'description_secondary' => 'Currently exploring the world of programming, building creative digital solutions, and continuously improving my technical skills.',
                'hero_cta_line' => "Let's build something amazing together.",
                'location' => 'Gresik / Surabaya, Jawa Timur, Indonesia',
                'coordinates' => '7.1654° S, 112.6426° E',
                'timezone' => 'GMT+7 (WIB)',
                'status' => 'Open for Internship, Collaborative Projects & Freelance',
                'email' => 'bagus.setyo.nugroho@student.uisi.ac.id',
                'phone' => '+62 812-3456-7890',
                'experience_years' => '3+',
                'avatar_url' => '/images/bagus-hero.jpg',
                'about_photo_url' => '/images/bagus-about.jpg',
            ],

            'stats' => [
                [
                    'value' => 18,
                    'suffix' => '+',
                    'label' => 'Total Projects',
                    'sublabel' => 'Web, Software & UI/UX Works',
                    'icon' => 'layers',
                ],
                [
                    'value' => 5,
                    'suffix' => 'th',
                    'label' => 'Current Semester',
                    'sublabel' => 'Informatics @ UISI',
                    'icon' => 'graduation-cap',
                ],
                [
                    'value' => 12,
                    'suffix' => '+',
                    'label' => 'Certificates',
                    'sublabel' => 'Courses & Tech Credentials',
                    'icon' => 'award',
                ],
                [
                    'value' => 4,
                    'suffix' => '+',
                    'label' => 'Organizations',
                    'sublabel' => 'Campus & Tech Communities',
                    'icon' => 'users',
                ],
            ],

            'about' => [
                'intro_title' => 'Turning Ideas Into Digital Experiences.',
                'short_introduction' => 'A 5th-semester Informatics student at Universitas Internasional Semen Indonesia, passionate about technology, programming, and creating innovative digital experiences.',
                'introduction' => 'Saya Bagus Setyo Nugroho, mahasiswa semester 5 Program Studi Informatika di Universitas Internasional Semen Indonesia (UISI).',
                'introduction_secondary' => 'Saya memiliki ketertarikan dalam bidang teknologi informasi, khususnya Web Development, Software Engineering, UI/UX Design, dan pengembangan sistem digital.',
                'introduction_tertiary' => 'Saya senang mempelajari hal baru, mengeksplorasi teknologi, mengembangkan ide kreatif, serta membangun proyek digital yang inovatif dan bermanfaat.',
                'education' => [
                    [
                        'period' => '2024 — Sekarang (Semester 5)',
                        'degree' => 'S1 Informatika (Computer Science / Informatics)',
                        'institution' => 'Universitas Internasional Semen Indonesia (UISI)',
                        'highlight' => 'Mahasiswa Aktif Semester 5 • Fokus Software & Web Engineering',
                        'description' => 'Mendalami Rekayasa Perangkat Lunak, Pemrograman Web Berbasis Framework, Struktur Data & Algoritma, Desain Antarmuka (UI/UX), Basis Data Relasional, serta Pengembangan Sistem Informasi Digital.',
                    ],
                    [
                        'period' => '2024 — 2026',
                        'degree' => 'Independent Web, Software & UI/UX Exploration Track',
                        'institution' => 'Dicoding Academy, Coursera & Campus Tech Bootcamps',
                        'highlight' => 'Eksplorasi Aktif Full-Stack Web & Modern Interface Design',
                        'description' => 'Memperkuat keahlian praktis dalam pengembangan aplikasi web berbasis Laravel, React, TypeScript, Tailwind CSS, serta perancangan sistem desain menggunakan Figma.',
                    ],
                ],
                'core_skills' => [
                    [
                        'title' => 'Web Development & Modern Frontend',
                        'icon' => 'layout-template',
                        'desc' => 'Merancang dan membangun website modern yang responsif, cepat, dan terstruktur menggunakan HTML5, CSS3, JavaScript, Tailwind CSS, React, serta Laravel Blade.',
                    ],
                    [
                        'title' => 'Software Engineering & Digital Systems',
                        'icon' => 'server',
                        'desc' => 'Mengembangkan logika aplikasi yang bersih, modular, dan mudah dikembangkan dengan arsitektur MVC Laravel, RESTful API, serta manajemen database MySQL.',
                    ],
                    [
                        'title' => 'UI/UX Design & Digital Innovation',
                        'icon' => 'sparkles',
                        'desc' => 'Menerjemahkan ide kreatif menjadi prototipe antarmuka yang intuitif, estetis, dan berorientasi pada kenyamanan pengalaman pengguna (User Experience).',
                    ],
                ],
                'organizations' => [
                    [
                        'role' => 'Active Member & Software Division',
                        'organization' => 'Himpunan Mahasiswa Informatika (HMIF) — UISI',
                        'period' => '2024 — Sekarang',
                        'description' => 'Berpartisipasi aktif dalam kegiatan pengembangan keilmuan mahasiswa Informatika UISI, kolaborasi proyek teknologi kampus, serta penyelenggaraan seminar dan workshop pemrograman.',
                    ],
                    [
                        'role' => 'Web & Digital Media Contributor',
                        'organization' => 'UISI Tech & Digital Innovation Community',
                        'period' => '2025 — Sekarang',
                        'description' => 'Berdiskusi dan berkolaborasi bersama rekan mahasiswa dalam eksplorasi Web Development, UI/UX Design Challenge, serta pengembangan solusi digital kreatif.',
                    ],
                    [
                        'role' => 'Technical & Creative Committee',
                        'organization' => 'Informatics Annual Tech Event & Exhibition — UISI',
                        'period' => '2025 — 2026',
                        'description' => 'Terlibat dalam pengelolaan sistem informasi acara, publikasi digital, dan pameran karya inovasi mahasiswa Program Studi Informatika.',
                    ],
                ],
                'career_goals' => 'Terus berkembang menjadi Software Developer yang andal dengan menghadirkan solusi digital kreatif, menggabungkan ketangguhan rekayasa perangkat lunak (Software Engineering) dengan keindahan desain UI/UX yang berdampak nyata bagi masyarakat dan industri.',
            ],

            'projects' => [
                [
                    'id' => 1,
                    'index' => '01',
                    'title' => 'SIMAK-UISI — Academic & Student Activity Portal',
                    'category' => 'Full-Stack',
                    'year' => '2026',
                    'featured' => true,
                    'accent' => '#6366F1',
                    'preview_type' => 'fintech',
                    'description' => 'Platform web terintegrasi untuk manajemen kegiatan akademik, jadwal perkuliahan, portofolio tugas, serta kolaborasi proyek mahasiswa Informatika dengan dashboard interaktif yang modern.',
                    'highlights' => [
                        'Dashboard pelacakan progres semester & manajemen jadwal terstruktur',
                        'Antarmuka dark/light modern dengan performa waktu muat instan',
                        'Arsitektur MVC Laravel & skema database relasional MySQL',
                    ],
                    'tech' => ['Laravel 12', 'Blade', 'Tailwind CSS', 'JavaScript', 'MySQL'],
                    'live_url' => '#projects',
                    'repo_url' => 'https://github.com/bagussetyonugroho',
                    'metrics' => '99% Lighthouse Score • Clean MVC Architecture',
                ],
                [
                    'id' => 2,
                    'index' => '02',
                    'title' => 'NovaUI — Minimalist Web Component & Design System',
                    'category' => 'Design System',
                    'year' => '2026',
                    'featured' => true,
                    'accent' => '#10B981',
                    'preview_type' => 'design-system',
                    'description' => 'Koleksi komponen UI/UX modern bergaya editorial minimalis yang dirancang di Figma dan diimplementasikan ke dalam kode menggunakan Tailwind CSS serta TypeScript untuk mempercepat pengembangan web.',
                    'highlights' => [
                        '45+ komponen UI reusable dengan tipografi tegas & kontras presisi',
                        'Sistem token warna, grid responsif, dan micro-interactions halus',
                        'Dokumentasi interaktif untuk konsistensi desain lintas proyek',
                    ],
                    'tech' => ['React.js', 'TypeScript', 'Tailwind CSS', 'Figma', 'Lucide Icons'],
                    'live_url' => '#projects',
                    'repo_url' => 'https://github.com/bagussetyonugroho',
                    'metrics' => '45+ Reusable Components • UI/UX System',
                ],
                [
                    'id' => 3,
                    'index' => '03',
                    'title' => 'TaskFlow Studio — Collaborative Project & Sprint Tracker',
                    'category' => 'Web App',
                    'year' => '2025',
                    'featured' => true,
                    'accent' => '#8B5CF6',
                    'preview_type' => 'kanban',
                    'description' => 'Aplikasi web manajemen tugas tim dan organisasi kampus dengan fitur papan Kanban interaktif, penanda prioritas tugas, tenggat waktu proyek, serta analitik produktivitas mingguan.',
                    'highlights' => [
                        'Manajemen tugas berbasis papan Kanban yang intuitif dan responsif',
                        'Filter instan berdasarkan status, prioritas, dan anggota tim',
                        'Desain antarmuka fokus yang meminimalkan distraksi pengguna',
                    ],
                    'tech' => ['Laravel', 'Tailwind CSS', 'Alpine.js', 'MySQL', 'REST API'],
                    'live_url' => '#projects',
                    'repo_url' => 'https://github.com/bagussetyonugroho',
                    'metrics' => 'Real-Time Task Filtering • Responsive UX',
                ],
                [
                    'id' => 4,
                    'index' => '04',
                    'title' => 'KaryaDigital — Creative Showcase & Innovation Hub',
                    'category' => 'Frontend UI',
                    'year' => '2025',
                    'featured' => false,
                    'accent' => '#F59E0B',
                    'preview_type' => 'ecommerce',
                    'description' => 'Platform galeri digital untuk menampilkan karya inovasi teknologi, proyek perangkat lunak, dan studi kasus desain UI/UX mahasiswa dengan tata letak editorial modern.',
                    'highlights' => [
                        'Galeri interaktif dengan pencarian & filter kategori secara langsung',
                        'Animasi scroll reveal yang halus dan transisi kartu elegan',
                        'Optimal di perangkat Desktop, Tablet, hingga Smartphone',
                    ],
                    'tech' => ['HTML5', 'CSS3', 'JavaScript ES6+', 'Tailwind CSS', 'Vite'],
                    'live_url' => '#projects',
                    'repo_url' => 'https://github.com/bagussetyonugroho',
                    'metrics' => '100% Mobile Responsive • Editorial Grid',
                ],
                [
                    'id' => 5,
                    'index' => '05',
                    'title' => 'SmartInvent — Digital Inventory & Asset Information System',
                    'category' => 'Full-Stack',
                    'year' => '2025',
                    'featured' => false,
                    'accent' => '#06B6D4',
                    'preview_type' => 'lms',
                    'description' => 'Sistem informasi manajemen inventaris laboratorium dan peminjaman perangkat digital dengan fitur pencatatan real-time, riwayat peminjaman, dan cetak laporan otomatis.',
                    'highlights' => [
                        'Otomatisasi pencatatan sirkulasi peminjaman & pengembalian aset',
                        'Validasi data berlapis dan ekspor laporan terformat',
                        'Antarmuka dashboard admin yang bersih dan mudah dipahami',
                    ],
                    'tech' => ['Laravel', 'PHP 8.2', 'MySQL', 'Bootstrap / Tailwind', 'Chart.js'],
                    'live_url' => '#projects',
                    'repo_url' => 'https://github.com/bagussetyonugroho',
                    'metrics' => 'Automated Reporting • Structured Database',
                ],
                [
                    'id' => 6,
                    'index' => '06',
                    'title' => 'EcoPulse — Smart Campus Environmental Dashboard UI',
                    'category' => 'Frontend UI',
                    'year' => '2024',
                    'featured' => false,
                    'accent' => '#EC4899',
                    'preview_type' => 'devops',
                    'description' => 'Eksplorasi desain UI/UX dan implementasi frontend dashboard pemantauan indikator lingkungan kampus hijau (Green Campus) dengan visualisasi metrik yang informatif.',
                    'highlights' => [
                        'Studi kasus UI/UX berfokus pada keterbacaan visualisasi data',
                        'Komponen kartu metrik modular dengan indikator status warna',
                        'Prototipe Figma lengkap beserta implementasi kode responsif',
                    ],
                    'tech' => ['Figma', 'React.js', 'Tailwind CSS', 'UI/UX Design'],
                    'live_url' => '#projects',
                    'repo_url' => 'https://github.com/bagussetyonugroho',
                    'metrics' => 'Award-Winning UI Concept • Data Visualization',
                ],
            ],

            'certificates' => [
                [
                    'id' => 1,
                    'title' => 'Belajar Dasar Pemrograman Web & Front-End Modern',
                    'issuer' => 'Dicoding Indonesia',
                    'issuer_badge' => 'DICODING VERIFIED',
                    'year' => '2026',
                    'date' => 'Februari 2026',
                    'credential_id' => 'DCD-WEB-BSN-2026',
                    'category' => 'Web Development',
                    'accent' => '#3B82F6',
                    'skills' => ['HTML5 Semantic', 'Modern CSS3', 'Responsive Layout', 'DOM Manipulation', 'Web Accessibility'],
                    'description' => 'Sertifikasi kompetensi dalam membangun struktur dan tampilan website modern yang semantik, responsif di berbagai ukuran layar, dan mengikuti standar industri.',
                ],
                [
                    'id' => 2,
                    'title' => 'Full-Stack Web Development with Laravel Framework',
                    'issuer' => 'BuildWithAngga / Tech Bootcamp',
                    'issuer_badge' => 'EXCELLENCE GRADUATE',
                    'year' => '2025',
                    'date' => 'November 2025',
                    'credential_id' => 'BWA-LRV-BSN-8841',
                    'category' => 'Software Engineering',
                    'accent' => '#10B981',
                    'skills' => ['Laravel MVC', 'Blade Templating', 'Eloquent ORM', 'MySQL Database', 'Tailwind CSS'],
                    'description' => 'Menyelesaikan kurikulum pengembangan aplikasi web end-to-end menggunakan framework Laravel, perancangan database relasional, dan manajemen autentikasi.',
                ],
                [
                    'id' => 3,
                    'title' => 'Foundations of User Experience (UX) & UI Design',
                    'issuer' => 'Google / Coursera Career Certificate',
                    'issuer_badge' => 'GOOGLE UX TRACK',
                    'year' => '2025',
                    'date' => 'September 2025',
                    'credential_id' => 'GGL-UX-BSN-5519',
                    'category' => 'UI/UX Design',
                    'accent' => '#F43F5E',
                    'skills' => ['User-Centered Design', 'Wireframing', 'Figma Prototyping', 'Visual Hierarchy', 'Design Systems'],
                    'description' => 'Validasi pemahaman mendalam mengenai prinsip desain berpusat pada pengguna, pembuatan wireframe hingga high-fidelity prototype di Figma, dan evaluasi kegunaan.',
                ],
                [
                    'id' => 4,
                    'title' => 'Belajar Pemrograman JavaScript & Aplikasi Interaktif',
                    'issuer' => 'Dicoding Indonesia',
                    'issuer_badge' => 'DICODING CERTIFIED',
                    'year' => '2025',
                    'date' => 'Juni 2025',
                    'credential_id' => 'DCD-JS-BSN-4092',
                    'category' => 'Programming & Logic',
                    'accent' => '#8B5CF6',
                    'skills' => ['JavaScript ES6+', 'Asynchronous JS', 'REST API Fetch', 'Modular Code', 'Data Structures'],
                    'description' => 'Penguasaan fundamental hingga fitur modern JavaScript (ES6+), pemrograman berorientasi objek, penanganan asynchronous API, dan logika pemrograman.',
                ],
                [
                    'id' => 5,
                    'title' => 'Database Design & SQL Programming Foundations',
                    'issuer' => 'Oracle Academy / University Track',
                    'issuer_badge' => 'ACADEMIC CREDENTIAL',
                    'year' => '2025',
                    'date' => 'Maret 2025',
                    'credential_id' => 'ORC-SQL-UISI-2025',
                    'category' => 'Database Systems',
                    'accent' => '#F59E0B',
                    'skills' => ['Relational Database', 'ERD Modeling', 'SQL Queries', 'Normalization', 'MySQL'],
                    'description' => 'Sertifikasi perancangan pemodelan data konseptual dan fisik (ERD), normalisasi basis data, serta optimasi query SQL untuk sistem informasi.',
                ],
                [
                    'id' => 6,
                    'title' => 'Software Engineering & Digital Innovation Seminar',
                    'issuer' => 'Informatika UISI & Industry Partners',
                    'issuer_badge' => 'UISI INFORMATICS',
                    'year' => '2024',
                    'date' => 'Desember 2024',
                    'credential_id' => 'UISI-IF-SEM-2024',
                    'category' => 'Digital Innovation',
                    'accent' => '#06B6D4',
                    'skills' => ['Software Lifecycle', 'Agile Collaboration', 'Git Workflow', 'Product Thinking', 'Tech Innovation'],
                    'description' => 'Partisipasi aktif dalam pengembangan wawasan rekayasa perangkat lunak modern, manajemen alur kerja tim dengan Git, serta inovasi produk digital.',
                ],
            ],

            'tech_stack' => [
                'Frontend Development' => [
                    'subtitle' => 'Antarmuka Web Modern, Responsif & Interaktif',
                    'icon' => 'monitor',
                    'items' => [
                        ['name' => 'HTML5 & CSS3', 'role' => 'Semantic Web & Styling', 'level' => '95%', 'color' => '#E34F26', 'badge' => 'Core'],
                        ['name' => 'JavaScript (ES6+)', 'role' => 'Interactive Web Logic', 'level' => '88%', 'color' => '#F7DF1E', 'badge' => 'Core'],
                        ['name' => 'Tailwind CSS', 'role' => 'Utility-First CSS Framework', 'level' => '94%', 'color' => '#38BDF8', 'badge' => 'Primary'],
                        ['name' => 'Bootstrap 5', 'role' => 'Responsive UI Toolkit', 'level' => '92%', 'color' => '#7952B3', 'badge' => 'Proficient'],
                        ['name' => 'React.js', 'role' => 'Component UI Library', 'level' => '84%', 'color' => '#61DAFB', 'badge' => 'Modern UI'],
                        ['name' => 'TypeScript', 'role' => 'Typed JavaScript', 'level' => '80%', 'color' => '#3178C6', 'badge' => 'Exploring'],
                    ],
                ],
                'Backend Development' => [
                    'subtitle' => 'Pemrograman Server, Arsitektur MVC & Sistem Digital',
                    'icon' => 'server',
                    'items' => [
                        ['name' => 'Laravel', 'role' => 'Full-Stack PHP Framework', 'level' => '92%', 'color' => '#FF2D20', 'badge' => 'Primary'],
                        ['name' => 'PHP 8+', 'role' => 'Server-Side Development', 'level' => '90%', 'color' => '#777BB4', 'badge' => 'Core'],
                        ['name' => 'Blade Template', 'role' => 'Modular View Engine', 'level' => '94%', 'color' => '#F97316', 'badge' => 'Primary'],
                        ['name' => 'RESTful API', 'role' => 'Web Service Integration', 'level' => '86%', 'color' => '#10B981', 'badge' => 'Architecture'],
                        ['name' => 'Node.js', 'role' => 'JavaScript Runtime', 'level' => '80%', 'color' => '#339933', 'badge' => 'Backend'],
                    ],
                ],
                'Database' => [
                    'subtitle' => 'Pemodelan Basis Data Relasional & Penyimpanan',
                    'icon' => 'database',
                    'items' => [
                        ['name' => 'MySQL', 'role' => 'Relational Database Management', 'level' => '92%', 'color' => '#4479A1', 'badge' => 'Primary'],
                        ['name' => 'SQLite', 'role' => 'Lightweight Embedded SQL', 'level' => '90%', 'color' => '#003B57', 'badge' => 'Fast DB'],
                        ['name' => 'PostgreSQL', 'role' => 'Advanced SQL Database', 'level' => '82%', 'color' => '#336791', 'badge' => 'SQL'],
                    ],
                ],
                'Tools & Software' => [
                    'subtitle' => 'Lingkungan Pengembangan, Version Control & Kolaborasi',
                    'icon' => 'terminal',
                    'items' => [
                        ['name' => 'Git & GitHub', 'role' => 'Version Control & Repository', 'level' => '92%', 'color' => '#F05032', 'badge' => 'Daily'],
                        ['name' => 'VS Code', 'role' => 'Code Editor & Extensions', 'level' => '96%', 'color' => '#007ACC', 'badge' => 'Primary'],
                        ['name' => 'Postman', 'role' => 'API Testing & Debugging', 'level' => '88%', 'color' => '#FF6C37', 'badge' => 'Testing'],
                        ['name' => 'Vite & Composer', 'role' => 'Build Tool & Dependency Mgr', 'level' => '90%', 'color' => '#646CFF', 'badge' => 'Workflow'],
                        ['name' => 'Laragon / XAMPP', 'role' => 'Local Server Environment', 'level' => '95%', 'color' => '#06B6D4', 'badge' => 'Dev Env'],
                    ],
                ],
                'Design Tools' => [
                    'subtitle' => 'UI/UX Prototyping, Wireframing & Visual Design',
                    'icon' => 'pen-tool',
                    'items' => [
                        ['name' => 'Figma', 'role' => 'UI/UX Design & Prototyping', 'level' => '92%', 'color' => '#F24E1E', 'badge' => 'Primary'],
                        ['name' => 'Canva Pro', 'role' => 'Visual & Presentation Design', 'level' => '94%', 'color' => '#00C4CC', 'badge' => 'Creative'],
                        ['name' => 'Framer', 'role' => 'Interactive Web Prototyping', 'level' => '82%', 'color' => '#0055FF', 'badge' => 'Motion'],
                    ],
                ],
            ],

            'socials' => [
                [
                    'name' => 'GitHub',
                    'handle' => '@bagussetyonugroho',
                    'url' => 'https://github.com/bagussetyonugroho',
                    'icon' => 'github',
                    'followers' => 'Code Repositories',
                ],
                [
                    'name' => 'LinkedIn',
                    'handle' => 'Bagus Setyo Nugroho',
                    'url' => 'https://linkedin.com/in/bagus-setyo-nugroho',
                    'icon' => 'linkedin',
                    'followers' => 'Professional Network',
                ],
                [
                    'name' => 'Instagram',
                    'handle' => '@bagussetyo.n',
                    'url' => 'https://instagram.com/bagussetyo.n',
                    'icon' => 'instagram',
                    'followers' => 'Daily & Tech Life',
                ],
                [
                    'name' => 'YouTube',
                    'handle' => 'Bagus Setyo Nugroho',
                    'url' => 'https://youtube.com/@bagussetyonugroho',
                    'icon' => 'youtube',
                    'followers' => 'Tech & Project Demos',
                ],
                [
                    'name' => 'TikTok',
                    'handle' => '@bagussetyo.dev',
                    'url' => 'https://tiktok.com/@bagussetyo.dev',
                    'icon' => 'tiktok',
                    'followers' => 'Coding & UI Insights',
                ],
            ],
        ];
    }

    /**
     * Render the main portfolio page.
     */
    public function index()
    {
        $data = $this->getPortfolioData();

        // Safely load comments from DB (auto-seed if empty)
        $comments = collect();
        try {
            if (Schema::hasTable('comments')) {
                if (Comment::count() === 0) {
                    (new DatabaseSeeder())->run();
                }
                $comments = Comment::orderByDesc('is_pinned')
                    ->orderByDesc('created_at')
                    ->get();
            }
        } catch (\Throwable $e) {
            // Fallback collection if DB is read-only
        }

        return view('portfolio.index', array_merge($data, [
            'comments' => $comments,
        ]));
    }

    /**
     * Store a new visitor comment (Guestbook).
     */
    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'role' => ['nullable', 'string', 'max:80'],
            'avatar_color' => ['nullable', 'string', 'in:indigo,emerald,violet,amber,rose,cyan'],
            'content' => ['required', 'string', 'min:3', 'max:600'],
        ]);

        $comment = Comment::create([
            'name' => strip_tags(trim($validated['name'])),
            'role' => !empty($validated['role']) ? strip_tags(trim($validated['role'])) : 'Portfolio Visitor',
            'avatar_color' => $validated['avatar_color'] ?? 'indigo',
            'content' => strip_tags(trim($validated['content'])),
            'likes' => 1,
            'is_pinned' => false,
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Komentar Anda berhasil ditambahkan ke Guestbook!',
                'comment' => [
                    'id' => $comment->id,
                    'name' => $comment->name,
                    'role' => $comment->role,
                    'initials' => $comment->initials,
                    'avatar_color' => $comment->avatar_color,
                    'content' => $comment->content,
                    'likes' => $comment->likes,
                    'is_pinned' => $comment->is_pinned,
                    'date_formatted' => $comment->created_at->translatedFormat('d M Y • H:i'),
                    'time_ago' => 'Baru saja',
                ],
                'total_comments' => Comment::count(),
            ]);
        }

        return redirect()->to(url('/#comments'))->with('success_comment', 'Komentar berhasil dikirim!');
    }

    /**
     * Like a guestbook comment.
     */
    public function likeComment(Request $request, Comment $comment)
    {
        $comment->increment('likes');

        return response()->json([
            'status' => 'success',
            'likes' => $comment->fresh()->likes,
        ]);
    }

    /**
     * Store a contact message from the Contact Section.
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'min:3', 'max:180'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        $contact = ContactMessage::create([
            'name' => strip_tags(trim($validated['name'])),
            'email' => strip_tags(trim($validated['email'])),
            'subject' => strip_tags(trim($validated['subject'])),
            'message' => strip_tags(trim($validated['message'])),
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih, ' . $contact->name . '! Pesan Anda untuk Bagus Setyo Nugroho telah diterima.',
                'reference_id' => 'MSG-' . str_pad((string) $contact->id, 4, '0', STR_PAD_LEFT),
            ]);
        }

        return redirect()->to(url('/#contact'))->with('success_contact', 'Pesan Anda berhasil dikirim!');
    }

    /**
     * Render / download the interactive Executive Curriculum Vitae.
     */
    public function downloadCv(Request $request)
    {
        $data = $this->getPortfolioData();
        return view('portfolio.cv', $data);
    }
}
