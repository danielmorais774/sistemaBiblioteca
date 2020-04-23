<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('matricula');
            $table->unsignedBigInteger('livro_id');
            $table->date('data_emprestimo');
            $table->date('prazo');
            $table->tinyInteger('status')->default(0);
            $table->foreign('matricula')->on('users')->references('matricula');
            $table->foreign('livro_id')->on('livros')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
