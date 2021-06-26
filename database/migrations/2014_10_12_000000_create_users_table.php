<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('logradouro', 35);
            $table->integer('numero');
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 35);
            $table->string('cidade', 35);
            $table->string('estado', 35);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',60);

           
   
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
