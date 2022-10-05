<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->integer( 'dia' );
            $table->string( 'fecha' );
            $table->string( 'horario' );
            $table->string( 'tema' );
            $table->foreignID( 'conferencista_id' )->constrained();
            $table->string( 'lugar' );
            $table->string( 'enlaceVirtual' )->nullable();
            $table->string( 'colaborador' )->nullable();
            $table->string( 'tipoEvento' );

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
        Schema::dropIfExists('eventos');
    }
}
