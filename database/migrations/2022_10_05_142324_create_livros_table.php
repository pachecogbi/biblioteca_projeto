<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('autor_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo', 128);
            $table->string('editora', 55);
            $table->string('genero', 55);
            $table->string('tipo_capa', 55);
            $table->string('idioma', 55);
            $table->date('ano_publicacao');
            $table->integer('paginas');
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
};
