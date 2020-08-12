<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('cle_rip');
            $table->string('etat');
            $table->float('solde');
            $table->string('date_creat');
            $table->string('date_ferm');
            $table->string('date_ferm_tempo');
            $table->string('date_reouvert');
            $table->timestamps();

            $table->foreignId('id_clientPhysique')
                ->constrained('clientphysique')
                ->nullable()
                ->constrained();

            $table->foreignId('id_type')
                ->constrained('typecompte')
                ->nullable()
                ->constrained();

            $table->foreignId('id_clientMoral')
                ->constrained('clientmoral')
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
        Schema::dropIfExists('compte');
    }
}
