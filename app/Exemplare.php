<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exemplare extends Model
{
    public static function getItens(){
        return $result = DB::select('select e.id as id,e.titulo,e.genero,a.nome from exemplares as e inner join autores as a on e.autor_id = a.id');
        //return $result = DB::table('autores')
        //->get();
    }

    public static function getItemId($id){
        $result = DB::select('select e.id as id,a.id as id_autor,e.titulo,e.descricao,e.genero,a.nome,e.autor_id from exemplares as e inner join autores as a on e.autor_id = a.id where e.id = ?',[$id]);
        return $result[0];
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }
}
