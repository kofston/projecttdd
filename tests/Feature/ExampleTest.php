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

    public function test_toword()
    {
        //Wprowadź wartość (walutę) do testów
        $get_number = '25,54';
        //Sprawdź czy podana liczba, jeśli nie to failed
        $this->assertIsNumeric(str_replace(',','.',$get_number));
        //Sprawdź czy wpisana kwota jest większa od 0
        $this->assertGreaterThan(0,$get_number);
        //request do metody
        $response = $this->get('http://127.0.0.1:8000/toword/'.$get_number);
        //Sprawdź czy istnieje
        $this->assertEquals(200,$response->getStatusCode());
        //Sprawdź czy wróciło grosze (zawsze wróci /100)
        $response->assertSee('/100');

        //Teraz zrób testowy request dla 129 zł 15 groszy
        $response2 = $this->get('http://127.0.0.1:8000/toword/129,15');
        //Poprawna oczekiwana odpowiedź / grosze
        $response2->assertSee("15/100");
        //Poprawna oczekiwana odpowiedź / zł
        $response2->assertSee("sto dwadzieścia dziewięć złotych");
        //Wywyołaj z 0
        $response3 = $this->get('http://127.0.0.1:8000/toword/0');
        $response3->assertSee("ZERO");
        //Wywyołaj z liczbą ale z kropką (będzie obsługiwany tylko separator przecinka)
        $response3 = $this->get('http://127.0.0.1:8000/toword/1.99');
        //Poniżej poprawny zwrot
        $response3->assertSee(" jeden złoty  99/100");
        $response4 = $this->get('http://127.0.0.1:8000/toword/AlaMaKota');
        $response4->assertSee("TO_NIE_LICZBA!");


    }
    public function test_toword_anothercurrency()
    {
        $response1 = $this->get('http://127.0.0.1:8000/toword/129,15/1');
        $response1->assertSee("dolarów");

        $response2 = $this->get('http://127.0.0.1:8000/toword/129,15/2');
        $response2->assertSee("euro");

        $response3 = $this->get('http://127.0.0.1:8000/toword/129,15/3');
        $response3->assertSee("funtów");
    }
}
