<?php

namespace App\Http\Controllers;

use App\Colaborador;
use App\Empresa;
use Illuminate\Http\Request;
use App\Rules\Cpf;

class ColaboradorController extends Controller
{
    private function validacao() {
        return [
            'cpf' => ['required', 'unique:colaboradores', new Cpf],
            'nome' => 'required|min:3|max:100',
            'empresa_id' => 'required|numeric|gt:0',
            'validade_integracao' => 'required|Date',
            'validade_exame' => 'required|Date',
            'validade_nr20' => 'required|Date',
            'proximo_exame' => 'required|min:3|max:20',
            'observacoes' => 'nullable',
            'aceitante_pts' => 'boolean',
        ];
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = [];
        if ($request->has('nome') && $request->has('empresa_id')) {
            if ($request->nome != '') {
                array_push($query, ['nome', 'like', $request->nome.'%']);
            }
            if ($request->empresa_id != 0) {
                array_push($query, ['empresa_id', $request->empresa_id]);
            }
            $colaboradores = Colaborador::where($query)->get();
        } else {
            $colaboradores = Colaborador::orderBy('nome', 'desc')->get();
        }
        $empresas = Empresa::orderBy('nome', 'desc')->get();
        return view('colaborador.index', [
            'colaboradores' => $colaboradores,
            'empresas' => $empresas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colaborador.create', ['empresas' => Empresa::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->flash();
        $request->validate($this->validacao());

        $colaborador = new Colaborador;
        $colaborador->cpf = $request->cpf;
        $colaborador->nome = $request->nome;
        $colaborador->empresa_id = $request->empresa_id;
        $colaborador->validade_integracao = $request->validade_integracao;
        $colaborador->validade_exame = $request->validade_exame;
        $colaborador->validade_nr20 = $request->validade_nr20;
        $colaborador->proximo_exame = $request->proximo_exame;
        $colaborador->observacoes = $request->observacoes;
        $colaborador->aceitante_pts = $request->aceitante_pts;

        $colaborador->save();
        return redirect('/colaboradores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show(Colaborador $colaborador)
    {
        return $colaborador;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function edit(Colaborador $colaborador)
    {
        return view('colaborador.edit', [
            'colaborador' => $colaborador,
            'empresas' => Empresa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate($this->validacao());

        $colaborador->cpf = $request->cpf;
        $colaborador->nome = $request->nome;
        $colaborador->empresa_id = $request->empresa_id;
        $colaborador->validade_integracao = $request->validade_integracao;
        $colaborador->validade_exame = $request->validade_exame;
        $colaborador->validade_nr20 = $request->validade_nr20;
        $colaborador->proximo_exame = $request->proximo_exame;
        $colaborador->observacoes = $request->observacoes;
        $colaborador->aceitante_pts = $request->aceitante_pts;

        $colaborador->save();
        return redirect('/colaboradores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();
        return redirect('/colaboradores');
    }
}
