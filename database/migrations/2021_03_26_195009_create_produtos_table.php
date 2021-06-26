<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('marca', 100);
            $table->string('modelo', 60);
            $table->enum('voltagem', ['110v', '220v', 'Bivolt', 'Sem voltagem']);
            $table->integer('quantidade');
            $table->decimal('valor_unit_custo', 10,2);
            $table->decimal('valor_unit_venda', 10,2);

            $table->unsignedInteger('categoria_produto_id');
            $table->foreign('categoria_produto_id')->references('id')->on('categoria_produtos')->onDelete('cascade')->onUpdate('cascade'); 
            
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
        Schema::dropIfExists('produtos');
    }
}
