<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmprestimoController extends Controller
{
    public function index()
    {
        //$listaAutores = DB::select("select * from editoras");
        return view('emprestimo');
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
        $data = date('y-m-d');
        $statusLivroReserva = DB::select('select status from livros where id = ?',[$request->livro])[0];
        $statusLivro = DB::select('select emprestado from livros where id = ?',[$request->livro])[0];
        //dd($statusLivro->status);
        if($statusLivroReserva->status == 'R'){
            $reserva = DB::select('select count(*) as num from reservas where livro_id = ? and matricula = ?',[$request->livro,$request->matricula])[0];
            if($reserva->num != 1){
                return redirect()
                    ->route('emprestimos.index')
                    ->with('error','Livro reservado a outro aluno!!');
            }
        }

        if($statusLivro->emprestado == '1'){
            return redirect()
                ->route('emprestimos.index')
                ->with('error','Livro já emprestado!!');
        }
        $result = DB::insert('insert into emprestimos (matricula , livro_id,data_emprestimo,prazo) values (?,?,?,?)',[$request->matricula,$request->livro,$data,$request->prazo]);
        if ($result == true){
            $retiraReseva = DB::delete('Delete from reservas where matricula = ? and livro_id = ?',[$request->matricula,$request->livro]);
            return redirect()
                ->route('emprestimos.index')
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
        $result = DB::update('update emprestimos set matricula = ? , livro_id = ? ,prazo = ? where id = ?',[$request->matricula,$request->livro,$request->prazo,$id]);
        if ($result == true){
            return redirect()
                ->route('emprestimos.index')
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
        $result = DB::delete('delete from emprestimos where id = ?',[$id]);
        return json_encode($result);
    }

    public function getInfo(){
        $result = Emprestimo::getItens();
        return json_encode($result);
    }

    public function getInfoById($id){
        $result = Emprestimo::getItemId($id);
        return json_encode($result);
    }
}
