<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use App\Models\LivroAssunto;
use App\Models\LivroAutor;
use Illuminate\Http\Request;
use App\Models\Livros;

class LivrosController extends Controller
{
    protected $livros;

    public function __construct(){
        $this->livros = new Livros();
        $this->livroAssunto = new LivroAssunto();
        $this->livroAutor = new LivroAutor();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->livros->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idLivro = $this->livros->create($request->all());

        $paramsAssunto = [
            'livro_id' => $idLivro->id,
            'assunto_id' => $request->assunto
        ];
        $this->livroAssunto->create($paramsAssunto);

        $paramsAutor = [
            'livro_id' => $idLivro->id,
            'autor_id' => $request->autor
        ];
        $this->livroAutor->create($paramsAutor);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livros = $this->livros->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livros = $this->livros->find($id);
        $livros->update($request->all());
        return $livros;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livros = $this->livros->find($id);
        return $livros->delete();
    }
}
