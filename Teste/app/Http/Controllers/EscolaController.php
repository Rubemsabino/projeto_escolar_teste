<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $escolas = Escola::all();
        return view('escolas.listar', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escolas.criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Escola $escola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escola $escola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escola $escola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escola $escola)
    {
        //
    }
}