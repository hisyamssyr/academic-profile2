<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class IdeaFormTest extends TestCase
{
    public function test_a_valid_submission_redirects_and_flashes_a_success_status(): void
    {
        $response = $this->get('/ide-agent?'.http_build_query([
            'nama' => 'Andi',
            'email' => 'andi@example.com',
            'ide' => 'Gagas agent untuk regresi visual.',
            'submit' => 1,
        ]));

        $response->assertRedirect('/ide-agent');
        $response->assertSessionHas('status', 'Ide berhasil dikirim.');

        $this->followingRedirects()->get('/ide-agent')
            ->assertOk()
            ->assertSee('Ide berhasil dikirim.');
    }

    public function test_a_valid_submission_is_written_to_the_log_instead_of_the_database(): void
    {
        Log::spy();

        $this->get('/ide-agent?'.http_build_query([
            'nama' => 'Andi',
            'email' => 'andi@example.com',
            'ide' => 'Gagas agent untuk regresi visual.',
            'submit' => 1,
        ]))->assertRedirect('/ide-agent');

        Log::shouldHaveReceived('info')
            ->once()
            ->withArgs(fn (string $message, array $context): bool => $context['email'] === 'andi@example.com');
    }

    public function test_dark_mode_survives_a_successful_submission(): void
    {
        $this->get('/ide-agent?'.http_build_query([
            'nama' => 'Andi',
            'email' => 'andi@example.com',
            'ide' => 'Gagas agent.',
            'mode' => 'dark',
            'submit' => 1,
        ]))->assertRedirect('/ide-agent?mode=dark');
    }

    public function test_an_invalid_submission_redirects_back_to_the_form_with_errors(): void
    {
        $response = $this->get('/ide-agent?'.http_build_query([
            'nama' => '',
            'email' => 'bukan-email',
            'ide' => '',
            'submit' => 1,
        ]));

        $response->assertRedirect('/ide-agent');
        $response->assertSessionHasErrors(['nama', 'email', 'ide']);
        $response->assertSessionMissing('status');
    }

    public function test_the_error_banner_lists_the_validation_messages_in_indonesian(): void
    {
        $this->followingRedirects()
            ->get('/ide-agent?'.http_build_query([
                'nama' => '',
                'email' => 'bukan-email',
                'ide' => '',
                'submit' => 1,
            ]))
            ->assertOk()
            ->assertSee('Ide gagal dikirim')
            ->assertSee('Field Nama wajib diisi.')
            ->assertSee('Field Email harus berupa alamat email yang valid.')
            ->assertSee('Field Ide / Feedback wajib diisi.');
    }

    public function test_submitted_values_survive_a_validation_failure(): void
    {
        $this->followingRedirects()
            ->get('/ide-agent?'.http_build_query([
                'nama' => 'Andi',
                'email' => 'bukan-email',
                'ide' => 'Feedback saya panjang.',
                'submit' => 1,
            ]))
            ->assertOk()
            ->assertSee('value="Andi"', false)
            ->assertSee('Feedback saya panjang.');
    }

    public function test_dark_mode_survives_a_validation_failure(): void
    {
        $this->get('/ide-agent?'.http_build_query([
            'nama' => 'Andi',
            'email' => 'bukan-email',
            'ide' => 'Feedback saya.',
            'mode' => 'dark',
            'submit' => 1,
        ]))->assertRedirect('/ide-agent?mode=dark');
    }

    public function test_the_success_banner_cannot_be_forged_with_a_query_parameter(): void
    {
        $response = $this->get('/ide-agent?submit=1');

        $response->assertRedirect('/ide-agent');
        $response->assertSessionMissing('status');

        $this->get('/ide-agent')
            ->assertOk()
            ->assertDontSee('Ide berhasil dikirim.');
    }

    public function test_an_oversized_submission_is_rejected(): void
    {
        $this->get('/ide-agent?'.http_build_query([
            'nama' => str_repeat('a', 256),
            'email' => 'andi@example.com',
            'ide' => 'Feedback.',
            'submit' => 1,
        ]))->assertSessionHasErrors('nama');
    }

    public function test_the_idea_agent_page_uses_the_status_banner_component(): void
    {
        $this->get('/ide-agent')
            ->assertOk()
            ->assertSee('Form tidak disimpan ke database', false)
            ->assertSee('<form method="GET"', false);
    }
}
