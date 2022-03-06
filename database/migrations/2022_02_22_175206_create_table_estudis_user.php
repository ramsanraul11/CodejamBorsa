<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstudisUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudisuser', function (Blueprint $table) {
            $table->bigIncrements('IdEstudiUser');
            $table->integer('AnyPromocio');
            $table->unsignedBigInteger('IdUsuari')->index()->nullable();
            $table->unsignedBigInteger('IdEstudi')->index()->nullable();
            $table->timestamps();
        });

        Schema::table('estudisuser', function (Blueprint $table) {
            $table->foreign('IdUsuari')->references('id')->on('users');
            $table->foreign('IdEstudi')->references('IdEstudi')->on('estudis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudisuser');
    }
}
