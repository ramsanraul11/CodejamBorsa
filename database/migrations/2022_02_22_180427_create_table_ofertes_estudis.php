<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOfertesEstudis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertesestudis', function (Blueprint $table) {
            $table->bigInteger("IdOferta")->unsigned();
            $table->foreign("IdOferta")->references("IdOferta")->on("ofertes")->onDelete("cascade");
            $table->bigInteger("IdEstudi")->unsigned();
            $table->foreign("IdEstudi")->references("IdEstudi")->on("estudis")->onDelete("cascade");
            $table->primary(["IdOferta","IdEstudi"]);
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
        Schema::dropIfExists('ofertesestudis');
    }
}
