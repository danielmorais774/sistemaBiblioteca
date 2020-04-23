<?php

namespace App\Http\Controllers;

use App\Editora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$listaAutores = DB::select("select * from editoras");
        return view('editora');
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
        $result = DB::insert('insert into editoras (nome , endereco,telefone,email,cidade) values (?,?,?,?,?)',[$request->nome,$request->endereco,$request->telefone,$request->email,$request->cidade]);
        if ($result == true){
            return redirect()
                ->route('editoras.index')
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
        $result = DB::update('update editoras set nome = ? , endereco = ? , telefone = ? ,email = ? , cidade = ? where id = ?',[$request->nome,$request->endereco,$request->telefone,$request->email,$request->cidade,$id]);
        if ($result == true){
            return redirect()
                ->route('editoras.index')
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
        $result = DB::delete('delete from editoras where id = ?',[$id]);
        return json_encode($result);
    }

    public function getInfo(){
        $result = Editora::getItens();
        return json_encode($result);
    }

    public function getInfoById($id){
        $result = Editora::getItemId($id);
        return json_encode($result);
    }
}
