<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Autor;
use DateTime;
use Session;
use Redirect;

class AutorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store()
    {
        // Crear un usuario ficticio y autenticarlo
        $this->withoutMiddleware();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $token = csrf_token();



        $response = $this->post('/autor', [
            'Nombre' => 'Orlando',
            'Nacionalidad' => 'Colombiano',
            'Fecha_Nacimiento' => '20',
            
        ]);

        $response->assertStatus(302); // Verificar si la redirección fue exitosa
        $this->assertDatabaseHas('autores', ['Nombre' => 'Orlando']); //Verificar si el producto se guardó en la base de datos (hacer insert)
    }
}
