<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicileDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_domicilio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("cliente_id")->unsigned();
            $table->string("calle", 100);
            $table->string("no_exterior",20);
            $table->string("no_interior", 20)->nullable();
            $table->string("colonia", 100);
            $table->string("municipio", 100);
            $table->string("estado", 100);
            $table->string("cp", 50);
            $table->string("actualizado", 10);

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
        Schema::dropIfExists('datos_domicilio');
    }
}
