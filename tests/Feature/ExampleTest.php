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
    public function test_api_call()
    {
        //Wprowadź wartość (walutę) do testów
        $get_number = '15.75';

        //Sprawdź czy podana liczba, jeśli nie to failed
        $this->assertIsNumeric($get_number);

        //request do metody
        $response = $this->call('GET','/get_api/'.$get_number);

        //Sprawdź czy api zwaraca te waluty w requeście , jeśli nie to błędne połączenie , albo błąd z serwerem po stronie API
        $response->assertSee('EUR');
        $response->assertSee('USD');
        $response->assertSee('GBP');

        //Jeśli testy pomyślne to połączenie z api jest poprawne!
    }

    public function test_api_call_history()
    {
        //request do metody
        $response = $this->call('GET','/get_api_history');

        //Sprawdź czy api zwaraca te waluty w requeście , jeśli nie to błędne połączenie , albo błąd z serwerem po stronie API
        $response->assertStatus(200);
        $response->assertSee('EUR');
        $response->assertSee('USD');
        $response->assertSee('GBP');

        //Jeśli testy pomyślne to połączenie z api jest poprawne!
    }
}
