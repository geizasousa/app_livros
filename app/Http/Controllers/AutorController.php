<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    protected $autor;

    public function __construct(){
        $this->autor = new Autor();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->autor->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->autor->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->autor->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = $this->autor->find($id);
        $autor->update($request->all());
        return $autor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = $this->autor->find($id);
        return $autor->delete();
    }
}
