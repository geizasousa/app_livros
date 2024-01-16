<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assunto;

class AssuntoController extends Controller
{
    protected $assunto;

    public function __construct(){
        $this->assunto = new Assunto();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->assunto->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->assunto->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->assunto->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assunto = $this->assunto->find($id);
        $assunto->update($request->all());
        return $assunto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assunto = $this->assunto->find($id);
        return $assunto->delete();
    }
}
