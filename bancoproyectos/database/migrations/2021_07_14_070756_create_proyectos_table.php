<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fuente');
            $table->string('fase');
            $table->decimal('valor',14,2);
            $table->string('sector');
            $table->integer('tiempo');
            $table->string('estado');
            $table->string('registro');
            $table->unsignedBigInteger('user_id');

            $table->foreign("user_id")
            ->references("id")
            ->on("users")
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
        Schema::dropIfExists('proyectos');
    }
}
