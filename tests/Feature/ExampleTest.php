<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_response_method_isset()
    {
        //Sprawdź czy ładuje się metoda z kontrolera istnieje (czy istnieje metoda index - domyślna / czy istnieje  routes ?)
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_response_view_isset()
    {
        // Sprawdź czy ładuje się widok / czy on istnieje
        $response = $this->view('welcome');
        $response->assertSee('div');
    }
}
