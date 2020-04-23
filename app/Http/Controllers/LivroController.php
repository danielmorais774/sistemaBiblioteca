<?php

namespace App\Http\Controllers;

use App\Livro;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{

    public function index()
    {
        $listaEditora = DB::select("select * from editoras");
        $listaExemplar = DB::select("select * from exemplares");
        return view('adicionarLivros',compact(['listaEditora','listaExemplar']));
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
        $livro = $request;
        if ($request->hasFile('imgLivro')) {
            //$product->path_image = this.saveImage($request->primaryImage, $product->id, 'slider', 250);
            $urlimage = Livro::saveImage($request->imgLivro, mt_rand(5, 15), 'livro');
        }
        $result = DB::insert('insert into livros (titulo , editora_id , exemplar_id,urlimage) values (?,?,?,?)',[$request->titulo,$request->editora,$request->exemplar,$urlimage]);
        if ($result == true){
            return redirect()
                ->route('livros.index')
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
        if ($request->hasFile('imgLivro')) {
            //$product->path_image = this.saveImage($request->primaryImage, $product->id, 'slider', 250);
            $urlimage = Livro::saveImage($request->imgLivro, mt_rand(5, 15), 'livro');
            $result = DB::update('update livros set titulo = ? , editora_id = ? , exemplar_id = ?, urlimage = ? where id = ?',[$request->titulo,$request->editora,$request->exemplar,$urlimage,$id]);
        }else{
            $result = DB::update('update livros set titulo = ? , editora_id = ? , exemplar_id = ? where id = ?',[$request->titulo,$request->editora,$request->exemplar,$id]);
        }
        if ($result == true){
            return redirect()
                ->route('livros.index')
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
        $result = DB::delete('delete from livros where id = ?',[$id]);
        return json_encode($result);
    }

    public function getInfo(){
        $result = Livro::getItens();
        return json_encode($result);
    }

    public function getInfoBookPage($busca = null){
        $result = Livro::getBooksPage($busca);
        return json_encode($result);
    }

    public function getInfoBookPageById($id){
        $result = Livro::getBooksPageById($id);
        return json_encode($result);
    }

    public function getInfoById($id){
        $result = Livro::getItemId($id);
        return json_encode($result);
    }

}
