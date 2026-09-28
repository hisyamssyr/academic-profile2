<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class DynamicChallengeTest extends TestCase
{
    /**
     * @return array<string, array{string}>
     */
    public static function darkCapableRouteProvider(): array
    {
        return [
            'home' => ['/'],
            'profil mahasiswa' => ['/profil-mahasiswa'],
            'ide agent' => ['/ide-agent'],
            'beranda' => ['/beranda'],
        ];
    }

    #[DataProvider('darkCapableRouteProvider')]
    public function test_dark_mode_enables_the_dark_class_on_the_html_element(string $uri): void
    {
        $this->get($uri.'?mode=dark')
            ->assertOk()
            ->assertSee('<html lang="id" class="dark">', false);
    }

    #[DataProvider('darkCapableRouteProvider')]
    public function test_pages_stay_in_light_mode_without_the_query_parameter(string $uri): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee('<html lang="id" class="">', false);
    }

    public function test_ide_agent_renders_dark_aware_classes(): void
    {
        $this->get('/ide-agent?mode=dark')
            ->assertOk()
            ->assertSee('dark:bg-gray-800', false);
    }

    public function test_dark_mode_toggle_link_preserves_other_query_parameters(): void
    {
        $html = $this->get('/beranda?user=Andi&mode=dark')->assertOk()->getContent();

        $this->assertStringContainsString('/beranda?user=Andi"', $html);
    }

    public function test_dynamic_welcome_greets_the_named_user(): void
    {
        $this->get('/beranda?user=Andi')
            ->assertOk()
            ->assertSee('Selamat datang, Andi!');
    }

    public function test_dynamic_welcome_falls_back_when_no_user_is_given(): void
    {
        $this->get('/beranda')
            ->assertOk()
            ->assertSee('Selamat datang!')
            ->assertDontSee('Selamat datang,');
    }

    public function test_dynamic_welcome_escapes_the_user_supplied_value(): void
    {
        $this->get('/beranda?user='.urlencode('<script>alert(1)</script>'))
            ->assertOk()
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_navigation_links_carry_the_active_dark_mode(): void
    {
        $html = $this->get('/ide-agent?mode=dark')->assertOk()->getContent();

        $this->assertStringContainsString('/profil-mahasiswa?mode=dark', $html);
        $this->assertStringContainsString('/ide-agent?mode=dark', $html);
    }
}
