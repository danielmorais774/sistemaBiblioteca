<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reserva extends Model
{
    public static function getItemId($matricula){
        $result = DB::select('select r.id as id, lv.titulo, e.nome, lv.status from reservas as r inner join livros as lv on r.livro_id = lv.id inner join editoras as e on lv.editora_id = e.id where matricula = ?',[$matricula]);
        return $result;
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }
}
