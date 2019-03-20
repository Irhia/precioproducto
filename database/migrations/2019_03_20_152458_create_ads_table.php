<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            /* Definir el campo. */
            $table->unsignedBigInteger('category_id');
            /* Definir la relación. */
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
              /* on 'categories'-> de qué tabla hace referencia. */
            /* on Delete cascade para que se borre en cascada, sólo si lo deseamos. */

            $table->unsignedBigInteger('web_id');
            $table->foreign('web_id')->references('id')->on('webs')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('title');
            $table->text('url');
            /* nullable -> no es obligatorio que haya foto. */
            $table->text('foto')->nullable();
            /* Por defecto coge 0. */
            $table->integer('precio_vta')->default(0);
            $table->integer('precio_chollo')->default(0);
            $table->integer('precio_alto')->default(0);

           
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
        Schema::dropIfExists('ads');
    }
}
