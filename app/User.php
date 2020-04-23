<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telefone', 'cpf' , 'endereco' , 'cidade','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getItens(){
        return $result = DB::select('select id,matricula,name,cpf,telefone,email from users');
        //return $result = DB::table('autores')
        //->get();
    }

    public static function getItemId($id){
        $result = DB::select('select * from users where id = ?',[$id]);
        return $result[0];
        //return $result = DB::table('autores')->where('id',$id)->get()->first();
    }
}
