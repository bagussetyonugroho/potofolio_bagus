<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Comment::count() === 0) {
            $comments = [
                [
                    'name' => 'Dimas Pratama',
                    'role' => 'Senior Frontend Architect @ Tokopedia',
                    'avatar_color' => 'indigo',
                    'content' => 'Desain portofolio yang luar biasa bersih dan berkelas! Struktur grid-nya sangat rapi, tipografinya tegas, dan transisi antar bagiannya terasa seperti produk SaaS kelas dunia. Sukses terus kariernya!',
                    'likes' => 18,
                    'is_pinned' => true,
                    'created_at' => now()->subDays(5),
                    'updated_at' => now()->subDays(5),
                ],
                [
                    'name' => 'Sarah Wijaya',
                    'role' => 'Tech Recruiter & Talent Partner',
                    'avatar_color' => 'emerald',
                    'content' => 'Salah satu personal portfolio developer paling impresif yang pernah saya review tahun ini. Penyajian project showcase dan sertifikasinya sangat jelas dan memudahkan rekruter melihat kompetensi teknis secara langsung.',
                    'likes' => 14,
                    'is_pinned' => false,
                    'created_at' => now()->subDays(3),
                    'updated_at' => now()->subDays(3),
                ],
                [
                    'name' => 'Reza Mahendra',
                    'role' => 'Full-Stack Developer',
                    'avatar_color' => 'violet',
                    'content' => 'Kombinasi kontras warna dark obsidian dan micro-interactions pada kartu proyeknya keren banget. Sangat menginspirasi buat standar portfolio modern!',
                    'likes' => 9,
                    'is_pinned' => false,
                    'created_at' => now()->subDays(2),
                    'updated_at' => now()->subDays(2),
                ],
                [
                    'name' => 'Nadia Putri',
                    'role' => 'UI/UX Product Designer',
                    'avatar_color' => 'amber',
                    'content' => 'Visual hierarchy dan pemilihan font Space Grotesk + JetBrains Mono-nya sangat on-point. Detail kecil seperti custom cursor dan preview sertifikat interaktif memberikan pengalaman pengguna yang premium.',
                    'likes' => 11,
                    'is_pinned' => false,
                    'created_at' => now()->subHours(14),
                    'updated_at' => now()->subHours(14),
                ],
            ];

            foreach ($comments as $comment) {
                Comment::create($comment);
            }
        }
    }
}
