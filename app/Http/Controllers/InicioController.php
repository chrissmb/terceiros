<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colaborador;
use App\Empresa;

class InicioController extends Controller
{
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
        return view('inicio', [
            'colaboradores' => $colaboradores,
            'empresas' => $empresas,
        ]);
    }
}
