<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferencistas', function (Blueprint $table) {
            $table->id();

            $table->string( 'nombre' );
            $table->string( 'pais' );
            $table->string( 'correo' );
            $table->text( 'cv' );
            $table->string( 'foto' );

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conferencistas');
    }
}
