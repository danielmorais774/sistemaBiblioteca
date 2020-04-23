<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaLivro = DB::select("select * from livros");
        return view('reserva',compact('listaLivro'));
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
        if(Auth::user()->type == 'admin') {
            $matricula = $request->matricula;
        }else{
            $matricula = Auth::user()->matricula;
        }
        $statusLivroReserva = DB::select('select status from livros where id = ?',[$request->livro])[0];
        if($statusLivroReserva->status == 'R'){
            return redirect()
                ->route('reservar.index')
                ->with('error','Livro já reservado!!');
        }
        $data_atual = date('y-m-d');
        $result = DB::insert('insert into reservas (matricula , livro_id,momento_reserva) values (?,?,?)',[$matricula,$request->livro,$data_atual]);
        if ($result == true){
            return redirect()
                ->route('reservar.index')
                ->with('success','Sucesso!!');
        }else{
            return redirect()->back();
        }
    }

    public function reservarLivroSite(Request $request)
    {
        $matricula = Auth::user()->matricula;

        $statusLivroReserva = DB::select('select status from livros where id = ?',[$request->livro])[0];
        if($statusLivroReserva->status == 'R'){
            return redirect()
                ->route('reservar.index')
                ->with('error','Livro já reservado!!');
        }
        $data_atual = date('y-m-d');
        $result = DB::insert('insert into reservas (matricula , livro_id,momento_reserva) values (?,?,?)',[$matricula,$request->livro,$data_atual]);
        if ($result == true){
            return redirect()
                ->route('meusemprestimos.index')
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
        //
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
    }
}
