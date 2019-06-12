<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('nro_cliente');
          $table->timestamp('fecha');
          $table->string('servicio');
          $table->boolean('activo')->default(true);
          $table->timestamps();
          $table->index('nro_cliente');
          $table->foreign('nro_cliente')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
