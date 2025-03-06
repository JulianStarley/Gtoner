<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TonnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tonners = Tonner::all();
        return view('tonner.index', compact('tonners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tonner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'quantidade' => 'required|numeric|min:0',
        ]);

        Tonner::create($request->all());
        return redirect()->route('tonner.index')->with('success', 'Item criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tonner $tonner)
    {
        return view('tonner.show', compact('tonner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tonner $tonner)
    {
        return view('tonner.edit', compact('tonner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tonner $tonner)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'quantidade' => 'required|numeric|min:0',
        ]);

        $tonner->update($request->all());
        return redirect()->route('tonner.index')->with('success', 'Item atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tonner $tonner)
    {
        $tonner->delete();
        return redirect()->route('tonner.index')->with('success', 'Item excluído com sucesso!');
    }
}
