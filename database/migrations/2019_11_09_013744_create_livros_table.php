<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->unsignedBigInteger('editora_id');
            $table->unsignedBigInteger('exemplar_id');
            $table->boolean('emprestado')->default(0);
            $table->enum('status',['D','R'])->default('D');
            $table->string('urlimage')->default('');
            $table->foreign('editora_id')->on('editoras')->references('id');
            $table->foreign('exemplar_id')->on('exemplares')->references('id');
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
        Schema::dropIfExists('livros');
    }
}
