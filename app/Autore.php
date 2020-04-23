<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Autore extends Model
{
    protected $fillable = [
        'nome', 'biografia',
    ];

    public static function getItens(){
        return $result = DB::select('select id,nome,biografia from autores');
        //return $result = DB::table('autores')
            //->get();
    }

    public static function getItemId($id){
        $result = DB::select('select * from autores where id = ?',[$id]);
        return $result[0];
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }
}
