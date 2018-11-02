<?php

use App\Colaborador;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    $empresas = Empresa::all();
    return view('welcome');
});

Route::get('/', 'InicioController@index');

Route::resource('empresas', 'EmpresaController')->middleware('auth');

Route::resource('colaboradores', 'ColaboradorController')
        ->parameters(['colaboradores' => 'colaborador'])->middleware('auth');

Route::get('/login', 'Auth\LoginController@login')->name('login');

Route::post('/auth','Auth\LoginController@authenticate');
Route::get('/logout','Auth\LoginController@logout');
