<?php

namespace Tests\Feature;

use App\Models\Livros;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LivrosTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function checarColunasBD(): void
    {
        /*$response = $this->get('/');

        $response->assertStatus(200);*/

        $livros = new Livros();

        $campos = [
            'titulo',
            'editora',
            'edicao',
            'anopublicacao',
            'valor'
        ];

        $arrayCompare = array_diff($campos, $livros->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
