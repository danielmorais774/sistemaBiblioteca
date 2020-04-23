<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared("DELIMITER //
        CREATE TRIGGER tr_atualizaStatusEmprestimoLivro BEFORE UPDATE
        ON emprestimos FOR EACH ROW 
        BEGIN
            if NEW.status = 1 then
                UPDATE livros SET emprestado = 0 WHERE id = NEW.livro_id;
            end if;
            if NEW.status = 0 then
                UPDATE livros SET emprestado = 1 WHERE id = NEW.livro_id;
            end if;
        END //
        DELIMITER ;");

        \Illuminate\Support\Facades\DB::unprepared("");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
