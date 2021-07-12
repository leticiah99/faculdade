<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicoTipoServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
        Schema::create('ordem_servico_tipo_servico', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor', 10,2)->default(0);
            $table->integer('quantidade')->default(0);
           // $table->decimal('subTotal', 10,2);
            $table->unsignedInteger('ordem_servico_id');
            $table->unsignedInteger('tipo_servico_id');
        }); 

        Schema::table('ordem_servico_tipo_servico', function (Blueprint $table){
            $table->foreign('ordem_servico_id')->references('id')->on('ordem_servicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_servico_id')->references('id')->on('tipo_servicos')->onDelete('cascade')->onUpdate('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servico_tipo_servico');
    }
}
