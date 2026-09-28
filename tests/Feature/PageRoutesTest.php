<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    /**
     * @return array<string, array{string, string}>
     */
    public static function pageProvider(): array
    {
        return [
            'home' => ['/', 'Home - Academic Profile'],
            'profil mahasiswa' => ['/profil-mahasiswa', 'Profil Mahasiswa - Academic Profile'],
            'ide agent' => ['/ide-agent', 'Ide Agent - Academic Profile'],
            'beranda' => ['/beranda', 'Beranda - Academic Profile'],
        ];
    }

    #[DataProvider('pageProvider')]
    public function test_each_page_is_reachable_and_uses_the_master_layout(string $uri, string $title): void
    {
        $response = $this->get($uri);

        $response->assertOk();
        $response->assertSee('<title>'.$title.'</title>', false);
        $response->assertSee('Academic Profile');
        $response->assertSee('&copy; 2026 Hisyam Syafa Raditya', false);
        $response->assertSee('Institut Teknologi Sepuluh Nopember');
    }

    #[DataProvider('pageProvider')]
    public function test_child_views_do_not_duplicate_the_html_skeleton(string $uri): void
    {
        $html = $this->get($uri)->assertOk()->getContent();

        $this->assertSame(1, substr_count($html, '<!DOCTYPE html>'));
        $this->assertSame(1, substr_count($html, '<body'));
        $this->assertSame(1, substr_count($html, '<nav'));
        $this->assertSame(1, substr_count($html, '<footer'));
        $this->assertSame(1, substr_count($html, '<main'));
    }

    public function test_assets_are_loaded_through_vite_and_not_a_cdn(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('/build/assets/app-', $html);
        $this->assertStringNotContainsString('cdn.', $html);
        $this->assertStringNotContainsString('unpkg.com', $html);
        $this->assertStringNotContainsString('jsdelivr', $html);
    }

    public function test_profile_page_shows_the_complete_academic_identity(): void
    {
        $response = $this->get('/profil-mahasiswa');

        $response->assertOk();
        $response->assertSee('Hisyam Syafa Raditya');
        $response->assertSee('5025241130');
        $response->assertSee('S1 Teknik Informatika');
        $response->assertSee('2024');
        $response->assertSee('3.51 / 4.00');
        $response->assertSee('Data Analysis & Machine Learning', false);
    }

    public function test_profile_page_lists_all_five_experiences(): void
    {
        $response = $this->get('/profil-mahasiswa');

        $response->assertSee('External Affairs Staff');
        $response->assertSee('Head of Food & Nutrition', false);
        $response->assertSee('Teaching Assistant Database Systems');
        $response->assertSee('Vice Head II of Data Management');
        $response->assertSee('Programming Division Internship');
    }

    public function test_idea_agent_page_documents_all_three_agents_and_the_full_tech_stack(): void
    {
        $response = $this->get('/ide-agent');

        $response->assertOk();
        $response->assertSee('qa-explorer');
        $response->assertSee('security-scanner');
        $response->assertSee('repair-engineer');
        $response->assertSee('Qwen3 1.7B via llama.cpp');
        $response->assertSee('Playwright + Headless Chromium');
        $response->assertSee('GitHub App + GitHub Actions');
        $response->assertSee('PostgreSQL + Queue');
    }
}
