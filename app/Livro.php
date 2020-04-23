<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Livro extends Model
{
    public static function saveImage($image, $id, $type)
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . random_int(100, 999);
            $destinationPath = public_path('images/'.$type.'/');
            $url = 'images/'.$type.'/'.$fileName.'.'. $extension;
            $fullPath = $destinationPath.$fileName.'.'. $extension;
            $fullPath_reduc = $destinationPath.$fileName.'-500pxh.'. $extension;

            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $image = Image::make($file)
                ->encode('png');
            $image_reduc = Image::make($file)
                ->resize(null,500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png');

            $image->save($fullPath, 100);
            $image_reduc->save($fullPath_reduc, 80);

            return $url;
        } else {
            return 'images/'.$type.'/placeholder300x300.jpg';
        }
    }

    public static function getItens(){
        return $result = DB::select('select lv.id as id, lv.titulo as titulo_livro , genero ,a.nome as nome_autor, e.nome as nome_editora , ex.id as id_exemplar from livros as lv inner join editoras as e on lv.editora_id = e.id inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id');
        //return $result = DB::table('autores')
        //->get();
    }

    public static function getItemId($id){
        $result = DB::select('select lv.id,lv.titulo,lv.editora_id,lv.exemplar_id,lv.emprestado,lv.status,ex.descricao from livros as lv inner join exemplares as ex on lv.exemplar_id = ex.id where lv.id = ?',[$id]);
        return $result[0];
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }

    public static function getInfoLivroID($id){
        $result = DB::select('select lv.titulo , e.nome as nome_editora,ex.descricao, a.nome as nome_autor,ex.genero from livros as lv inner join editoras as e on lv.editora_id = e.id inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id where lv.id = ?',[$id]);
        return $result[0];
    }

    public static function getBooksPage($busca){
        if($busca == null){
            return $result = DB::select('select lv.id as id, lv.titulo as titulo_livro ,a.nome as nome_autor,lv.urlimage from livros as lv inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id');
        }else{
            return $result = DB::table('livros as lv')
                ->select("lv.id as id", "lv.titulo as titulo_livro" ,"a.nome as nome_autor",'lv.urlimage')
                ->join('exemplares as ex','lv.exemplar_id','=','ex.id')
                ->join('autores as a','ex.autor_id','=' , 'a.id')
                ->where('lv.titulo', 'like', '%'.$busca.'%')
                ->get();
            //return $result = DB::select("select lv.id as id, lv.titulo as titulo_livro ,a.nome as nome_autor from livros as lv inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id where lv.titulo like '%?%'",[$busca]);
        }
    }
    public static function getBooksPageById($id){
        $result = DB::select('select lv.id as id, lv.titulo as titulo ,ex.genero,a.nome as autor,lv.urlimage,ex.descricao,lv.status,lv.emprestado from livros as lv inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id where lv.id = ?',[$id]);
        return $result[0];
    }

    public static function getBooksReservadosById(){
        $matricula = Auth::user()->matricula;
        return $result = DB::select('select lv.id as id, lv.titulo as titulo_livro ,a.nome as nome_autor,lv.urlimage,lv.urlimage from reservas as r inner join livros as lv on r.livro_id = lv.id inner join exemplares as ex on lv.exemplar_id = ex.id inner join autores as a on ex.autor_id = a.id where r.matricula = ?',[$matricula]);
    }
}
