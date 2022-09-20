<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fuente');
            $table->string('fase');
            $table->decimal('valor',20,2);
            $table->string('sector');
            $table->integer('tiempo');
            $table->string('estado');
            $table->string('registro');
            $table->string('registronombre');
            $table->string('bpin');
            $table->unsignedBigInteger('proyecto_id');

            $table->foreign("proyecto_id")
            ->references("id")
            ->on("proyectos")
            ->onUpdate("cascade")
            ->onDelete("cascade");
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
        Schema::dropIfExists('historias');
    }
}
