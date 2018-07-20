<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditoAutomotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('creditos_automotores', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('credito_id');
             $table->string('detalle');
             $table->float('cuota_uva');
             $table->integer('fecha_debito_cuota');
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
         Schema::dropIfExists('creditos_automotores');
     }
}
