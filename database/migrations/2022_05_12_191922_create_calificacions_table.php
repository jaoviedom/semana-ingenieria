<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->integer('evento');
            $table->integer('o1');
            $table->integer('o2');
            $table->integer('o3');
            $table->integer('o4');
            $table->integer('e1');
            $table->integer('e2');
            $table->integer('e3');
            $table->integer('e4');
            $table->integer('e5');
            $table->integer('r1');
            $table->integer('r2');
            $table->integer('r3');
            $table->integer('p1');
            $table->integer('p2');
            $table->integer('p3');
            $table->integer('p4');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('calificacions');
    }
}
