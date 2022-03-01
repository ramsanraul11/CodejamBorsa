<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOfertes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertes', function (Blueprint $table) {
            $table->bigIncrements('IdOferta');
            $table->string('descripcio', 255);
            $table->boolean('pendentEnviament');
            $table->unsignedBigInteger('IdEmpresa')->index()->nullable();
            $table->timestamps();
        });

        Schema::table('ofertes', function (Blueprint $table) {
            $table->foreign('IdEmpresa')->references('IdEmpresa')->on('empreses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertes');
    }
}
