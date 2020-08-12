<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientPhysiqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientphysique', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->float('salaire');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email');
            $table->string('login');
            $table->string('passwd');
            $table->string('profession');
            $table->string('nci');
            $table->timestamps();

            $table->foreignId('id_employeur')
                ->constrained('clientmoral')
                ->nullable()
                ->constrained();

            $table->foreignId('id_typeclient')
                ->constrained('typeclient')
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
        Schema::dropIfExists('clientphysique');
    }
}
