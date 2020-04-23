<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        //$listaAutores = DB::select("select * from editoras");
        return view('usuario');
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
        $senha = Hash::make($request->senha);
        $result = DB::insert('insert into users (matricula ,name , cpf, endereco, email,telefone,cidade,password) values (?,?,?,?,?,?,?,?)',[$request->matricula,$request->nome,$request->cpf,$request->endereco,$request->email,$request->telefone,$request->cidade,$senha]);
        if ($result == true){
            return redirect()
                ->route('usuarios.index')
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
        $data = $request;
        if($request->senha != null){
            if($request->senha != $request->confirmarsenha){
                return redirect()
                    ->back()
                    ->with('error','campos de senhas diferente!!');
            }
            $senha = Hash::make($request->senha);
            $result = DB::update('update users set matricula = ?, name = ? , cpf = ?, endereco = ? , telefone = ? ,email = ? , cidade = ? , password = ? where id = ?',[$request->matricula,$request->nome,$request->cpf,$request->endereco,$request->telefone,$request->email,$request->cidade,$senha,$id]);
            if ($result == true){
                return redirect()
                    ->route('usuarios.index')
                    ->with('success','Sucesso!!');
            }else{
                return redirect()->back();
            }
        }

        $result = DB::update('update users set matricula = ?, name = ? , cpf = ?, endereco = ? , telefone = ? ,email = ? , cidade = ? where id = ?',[$request->matricula,$request->nome,$request->cpf,$request->endereco,$request->telefone,$request->email,$request->cidade,$id]);
        if ($result == true){
            return redirect()
                ->route('usuarios.index')
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
        $result = DB::delete('delete from users where id = ?',[$id]);
        return json_encode($result);
    }

    public function getInfo(){
        $result = User::getItens();
        return json_encode($result);
    }

    public function getInfoById($id){
        $result = User::getItemId($id);
        return json_encode($result);
    }
}
