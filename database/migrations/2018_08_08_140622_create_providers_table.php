<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('documento');
            $table->string('direccion');
            $table->string('email');
            $table->text('telefono');

            $table->timestamps();
        });

         Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipofacturta');
            $table->string('numerofactura');
            $table->decimal('impuesto', 4, 2 );
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->integer('provider_id')->unsigned();
             $table->foreign('provider_id')->references('id')->on('providers');
            $table->timestamps();
        });
        

         Schema::create('detail_purchase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->decimal('preciocompra', 8, 2 );
            $table->decimal('precioventa', 8, 2 );
            $table->integer('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles')->onUpdate('cascade');
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
        
        Schema::dropIfExists('providers');
         Schema::dropIfExists('purchases');
          Schema::dropIfExists('detail_purchase');
    }
}
