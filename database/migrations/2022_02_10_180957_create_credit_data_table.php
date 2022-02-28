<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_credito', function (Blueprint $table) {
            $table->increments('id');
            $table-> integer("cliente_id");
            $table-> integer("monto");
            $table-> string("plazo",100);
            $table->float("pago_mensual",100);
            $table->string("tasa_interes",50);
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
        Schema::dropIfExists('datos_credito');
    }
}
