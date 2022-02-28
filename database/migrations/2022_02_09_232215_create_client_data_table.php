<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table-> integer("cliente_id")->unsigned();
            $table-> string("status",100);
            $table-> string("nombre",100);
            $table->string("apellido_paterno",100);
            $table->string("apellido_materno",100);
            $table->string( "rfc",15);
            $table->date("fecha_nacimiento");
            $table->float("ingresos");
            $table->float("egresos");
            $table-> string("no_dependientes",20);
            $table-> string("estado_civil",100);
            $table->string("genero",50) ;
             $table->string("ultimo_grado_estudios",100);
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
        Schema::dropIfExists('datos_cliente');
    }
}
