<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',255);
            $table->string('isbn',255);
            $table->string('autor',255);
            $table->unsignedTinyInteger('cantidad');
            $table->string('editorial',255)->nullable();
            $table->string('foto',255)->nullable();
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
        Schema::dropIfExists('libro');
    }
}
