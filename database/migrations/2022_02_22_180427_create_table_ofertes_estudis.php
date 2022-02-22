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
            $table->bigInteger("IdUsuari")->unsigned();
            $table->foreign("IdUsuari")->references("id")->on("users")->onDelete("cascade");
            $table->bigInteger("IdOferta")->unsigned();
            $table->foreign("IdOferta")->references("IdOferta")->on("ofertes")->onDelete("cascade");
            $table->primary(["IdUsuari","IdOferta"]);
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
