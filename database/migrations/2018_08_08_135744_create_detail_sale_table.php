<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    

    public function up()
    {

         Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigobar');
            $table->string('referencia');
            $table->string('nombre');
            $table->integer('stock');
            $table->text('descripcion');
            $table->enum('estado', ['activo','inactivo'])->default('activo');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('detail_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->decimal('precioventa', 8, 2 );
            $table->decimal('descuento', 8, 2 );
            $table->integer('sale_id')->unsigned();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles'); 
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
          Schema::dropIfExists('articles');
        Schema::dropIfExists('detail_sale');

    }
}
