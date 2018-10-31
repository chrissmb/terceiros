<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Colaborador;
use Illuminate\Http\Request;
use Validator;

class EmpresaController extends Controller
{
    private $validacao = ['nome' => 'required|max:100|min:3|unique:empresas'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validacao);
        $empresa = new Empresa;
        $empresa->nome = $request->nome;
        $empresa->save();
        return redirect('/empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate($this->validacao);
        $empresa->nome = $request->nome;
        $empresa->save();
        return redirect('/empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $colaboradores = Colaborador::where('empresa_id', $empresa->id)->first();
        
        
        if ($colaboradores == null) {
            $empresa->delete();
            return redirect()->back();
        }
        return redirect()->back()
            ->withErrors('Exclusão não será possível, pois há colaboradores '
            .'cadastrados nesta empresa.');
    }
}
