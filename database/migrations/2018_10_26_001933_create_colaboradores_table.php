<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 11)->unique();
            $table->string('nome', 100);
            $table->unsignedInteger('empresa_id');
            $table->date('validade_integracao');
            $table->date('validade_exame');
            $table->date('validade_nr20');
            $table->string('proximo_exame', 20);
            $table->text('observacoes')->nullable();
            $table->boolean('aceitante_pts');

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradores');
    }
}
