<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpreses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empreses', function (Blueprint $table) {
            $table->bigIncrements('IdEmpresa');
            $table->string('nom', 100);
            $table->string('email', 100);
            $table->timestamps();
        });

        Schema::table('empreses', function (Blueprint $table) {
            $table->unsignedBigInteger('IdOferta');
            $table->foreign('IdOferta')->references('IdOferta')->on('ofertes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empreses');
    }
}
