<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_home_page_renders_all_sections(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee("Hello, I'm");
        $response->assertSee('Bagus Setyo Nugroho');
        $response->assertSee('Universitas Internasional Semen Indonesia (UISI)');
        $response->assertSee('Turning Ideas Into Digital Experiences.');
        $response->assertSee('Explore My Work');
        $response->assertSee('Download CV');
        $response->assertSee('Perkenalan Diri');
        $response->assertSee('Latar Belakang Pendidikan');
        $response->assertSee('Featured Engineering Projects');
        $response->assertSee('Professional Certificates');
        $response->assertSee('Frontend Development');
        $response->assertSee('Backend Development');
        $response->assertSee('Database');
        $response->assertSee('Tools &amp; Software', false);
        $response->assertSee('Design Tools');
        $response->assertSee("Let's Work Together", false);
    }

    public function test_visitor_can_submit_comment_via_ajax(): void
    {
        $response = $this->postJson('/comments', [
            'name' => 'Andi Wijaya',
            'role' => 'Product Manager',
            'avatar_color' => 'emerald',
            'content' => 'Portfolio yang sangat elegan dan cepat!',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('comment.name', 'Andi Wijaya')
            ->assertJsonPath('comment.initials', 'AW');

        $this->assertDatabaseHas('comments', [
            'name' => 'Andi Wijaya',
            'role' => 'Product Manager',
        ]);
    }

    public function test_visitor_can_like_a_comment(): void
    {
        $comment = Comment::create([
            'name' => 'Test User',
            'role' => 'Developer',
            'avatar_color' => 'indigo',
            'content' => 'Keren sekali!',
            'likes' => 5,
        ]);

        $response = $this->postJson("/comments/{$comment->id}/like");

        $response->assertStatus(200)
            ->assertJsonPath('likes', 6);
    }

    public function test_visitor_can_send_contact_message_via_ajax(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'PT Teknologi Nusantara',
            'email' => 'hr@teknologi.co.id',
            'subject' => 'Full-Stack Developer Opportunity',
            'message' => 'Halo Rifqi, kami tertarik mengundang Anda untuk sesi diskusi teknis minggu depan.',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('status', 'success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'hr@teknologi.co.id',
            'subject' => 'Full-Stack Developer Opportunity',
        ]);
    }

    public function test_download_cv_page_renders_successfully(): void
    {
        $response = $this->get('/download-cv');

        $response->assertStatus(200);
        $response->assertSee('Executive Curriculum Vitae');
        $response->assertSee('Bagus Setyo Nugroho');
    }
}
