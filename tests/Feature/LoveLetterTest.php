<?php

namespace Tests\Feature;

use App\Mail\LoveLetter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LoveLetterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_send_love_letter(): void
    {
        Mail::fake();

        $response = $this->post(route('love-letter.send'));

        $response->assertStatus(200);

        Mail::assertSent(LoveLetter::class);
    }

    public function test_home_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
