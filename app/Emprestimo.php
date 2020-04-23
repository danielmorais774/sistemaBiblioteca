<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Emprestimo extends Model
{
    public static function getItens(){
        return $result = DB::select('select emp.id as id,emp.matricula , lv.titulo , u.telefone,emp.status from emprestimos as emp inner join livros as lv on emp.livro_id = lv.id inner join users as u on emp.matricula = u.matricula');
        //return $result = DB::table('autores')
        //->get();
    }

    public static function getItemId($id){
        $result = DB::select('select * from emprestimos where id = ?',[$id]);
        return $result[0];
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }
}
