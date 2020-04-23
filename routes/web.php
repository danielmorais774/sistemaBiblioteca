<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::prefix('admin')->group(function (){
    Route::get('/livrospage/{busca?}', 'LivroController@getInfoBookPage')->name('livros.bookpage');
    Route::get('/livrospageid/{id}', 'LivroController@getInfoBookPageById')->name('livros.bookpageid');
});

Route::middleware('auth')->prefix('conta')->group(function () {


    Route::post('/reservaSite/{id}', 'ReservaController@reservarLivroSite')->name('reservas.site');
    Route::get('/meusemprestimosreservados/all', 'MeuEmprestimoController@getLivroEmprestados')->name('meusemprestios.all');
    //Route::get('/meusemprestimos/{id}', 'LivroController@getInfoBookPageById')->name('meusemprestimos.bookpageid');
    Route::resource('meusemprestimos','MeuEmprestimoController');

});

Route::middleware('auth')->prefix('admin')->middleware('can:admin')->group(function () {
    Route::get('/', function () {
        return view('inicial');
    });


    Route::get('/autores/all/', 'AutorController@getInfo')->name('autores.infoall');
    Route::get('/autores/{id}', 'AutorController@getInfoById')->name('autores.infoid');
    Route::resource('autores','AutorController');



    //editora
    Route::get('/editoras/all/', 'EditoraController@getInfo')->name('editoras.infoall');
    Route::get('/editoras/{id}', 'EditoraController@getInfoById')->name('editoras.infoid');
    Route::resource('editoras','EditoraController');

    //user
    Route::get('/usuarios/all/', 'UsuarioController@getInfo')->name('usuarios.infoall');
    Route::get('/usuarios/{id}', 'UsuarioController@getInfoById')->name('usuarios.infoid');
    Route::resource('usuarios','UsuarioController');

    //Exemplares
    Route::get('/exemplares/all/', 'ExemplarController@getInfo')->name('exemplares.infoall');
    Route::get('/exemplares/{id}', 'ExemplarController@getInfoById')->name('exemplares.infoid');
    Route::resource('exemplares','ExemplarController');

    //Livros
    //Route::get('/livrospage/{busca?}', 'LivroController@getInfoBookPage')->name('livros.bookpage');

    Route::get('/livros/all/', 'LivroController@getInfo')->name('livros.infoall');
    Route::get('/livros/{id}', 'LivroController@getInfoById')->name('livros.infoid');
    Route::resource('livros','LivroController');

    //Emprestimos
    Route::get('/emprestimos/all/', 'EmprestimoController@getInfo')->name('emprestimos.infoall');
    Route::get('/emprestimos/{id}', 'EmprestimoController@getInfoById')->name('emprestimos.infoid');
    Route::resource('emprestimos','EmprestimoController');


    //Reserva
    Route::resource('reservar','ReservaController');

    //Reserva por Aluno

    Route::get('/reservas/{id}', 'ReservaPorAlunoController@getInfoById')->name('reservas.api');
    Route::resource('reservasaluno','ReservaPorAlunoController');

    //Devolução
    Route::get('/devolucoeslivro/{id}', 'DevolucaoController@getLivroById')->name('devolucoes.apibylivro');
    Route::resource('devolucoes','DevolucaoController');

});

