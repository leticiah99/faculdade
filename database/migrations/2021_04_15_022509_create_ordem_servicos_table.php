<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_inicial');
            $table->time('hora');
            $table->dateTime('data_final')->nullable();
            $table->string('descricao', 45);
            $table->enum('status', ['Aguardando', 'Em andamento', 'Finalizado', 'Cancelado'])->default('Aguardando');
            $table->enum('forma_pagamento', ['Crédito', 'Débito', 'Em espécie'])->nullable();
            $table->decimal('valor_pago', 10,2)->nullable();
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;

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
        Schema::dropIfExists('ordem_servicos');
    }
}
