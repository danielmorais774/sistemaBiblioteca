<?php

namespace App\Http\Controllers;

use App\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaLivro = DB::select("select * from livros");
        return view('devolucao',compact('listaLivro'));
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
        $result = DB::update('update emprestimos set status = ? where matricula = ? and livro_id = ?',[1,$request->matricula,$request->livro]);
        if ($result == true){
            return redirect()
                ->route('devolucoes.index')
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

    public function getLivroById($id){
        //$result = DB::select('select lv.titulo , e.nome as nome_editora, a.nome as nome_autor,ex.genero from livros as lv inner join editoras as e on lv.editora_id = e.id inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id where lv.id = ?',[$id]);
        //return $result;
        $result = Livro::getInfoLivroID($id);
        return json_encode($result);
    }
}
