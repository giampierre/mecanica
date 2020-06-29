<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');         
            $table->string('oem')->nullable();
            $table->longText('cod_gen')->nullable();            
            $table->longText('descripcion')->nullable();
            $table->longText('marca')->nullable();
            $table->char('id_ubi')->nullable();
            $table->double('costo');
            $table->double('costo_igv');           
            $table->double('venta');
            $table->char('cantidad');            
            $table->char('estado')->default('1');
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
        Schema::dropIfExists('articulos');
    }
}
