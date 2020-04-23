<?php

namespace App\Http\Controllers;

use App\Editora;
use App\Exemplare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExemplarController extends Controller
{
    public function index()
    {
        $listaAutores = DB::select("select * from autores");
        //dd($listaAutores);
        return view('exemplar',compact('listaAutores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = DB::insert('insert into exemplares (titulo,genero,autor_id,descricao) values (?,?,?,?)',[$request->titulo,$request->genero,$request->autor,$request->descricao]);
        if ($result == true){
            return redirect()
                ->route('exemplares.index')
                ->with('success','Sucesso!!');
        }else{
            return redirect()->back();
        }
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
        $result = DB::update('update exemplares set titulo = ? , genero = ? , autor_id = ?, descricao = ? where id = ?',[$request->titulo,$request->genero,$request->autor,$request->descricao,$request->id]);
        if ($result == true){
            return redirect()
                ->route('exemplares.index')
                ->with('success','Sucesso!!');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::delete('delete from exemplares where id = ?',[$id]);
        return json_encode($result);
    }

    public function getInfo(){
        $result = Exemplare::getItens();
        return json_encode($result);
    }

    public function getInfoById($id){
        $result = Exemplare::getItemId($id);
        return json_encode($result);
    }
}
