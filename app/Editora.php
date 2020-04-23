<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Editora extends Model
{
    //

    public static function getItens(){
        return $result = DB::select('select id,nome,email,endereco,telefone from editoras');
        //return $result = DB::table('autores')
        //->get();
    }

    public static function getItemId($id){
        $result = DB::select('select * from editoras where id = ?',[$id]);
        return $result[0];
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }
}
