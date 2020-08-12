<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FraisBancaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fraisbancaire', function (Blueprint $table) {
            $table->id();
            $table->float('frais');
            $table->string('date');
            $table->timestamps();

            $table->foreignId('id_compte')
                ->constrained('compte')
                ->nullable()
                ->constrained();

            $table->foreignId('id_typefrais')
                ->constrained('typefrais')
                ->nullable()
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fraisbancaire');
    }
}
