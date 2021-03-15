<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estudante;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estudante = Estudante::all();
        return view('index', compact('estudante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $storeData = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|max:255',
            'telefone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        $estudante = Estudante::create($storeData);

        return redirect('/estudantes')->with('Completado', 'Estudante salvo com sucesso!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudante = Estudante::findOrFail($id);
        return view('edit', compact('estudante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $updateData = $request->validate([
            'nome' => 'required|max:255',
            'email'=> 'required|max:255',
            'telefone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        Estudante::whereId($id)->update($updateData);
        return redirect('/estudantes')->with('Completado', 'Estudante alterado com Sucesso!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estudante = Estudante::findOrFail($id);
        $estudante->delete();

        return redirect('/estudantes')->with('Completado', 'Estudante deletado com sucesso!.');
    }
}
