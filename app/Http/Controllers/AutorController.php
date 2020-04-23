<?php

namespace App\Http\Controllers;

use App\Autore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $listaAutores = DB::select("select id,nome,biografia from autores");
        return view('autor',compact('listaAutores'));
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
    public function store(Request $request, Autore $autore)
    {
        $result = DB::insert('insert into autores (nome , biografia) values (?,?)',[$request->nome,$request->biografia]);
        if ($result == true){
            return redirect()
                ->route('autores.index')
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
        $result = DB::update('update autores set nome = ? , biografia = ? where id = ?',[$request->nome,$request->biografia,$request->id]);
        if ($result == true){
            return redirect()
                ->route('autores.index')
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
        $result = DB::delete('delete from autores where id = ?',[$id]);
        return json_encode($result);
    }

    public function getInfo(){
        $result = Autore::getItens();
        return json_encode($result);
    }

    public function getInfoById($id){
        $result = Autore::getItemId($id);
        return json_encode($result);
    }
}
