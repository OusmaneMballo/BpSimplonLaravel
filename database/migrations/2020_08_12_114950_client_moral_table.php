<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientMoralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientmoral', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('raison_social');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email');
            $table->string('login');
            $table->string('passwd');
            $table->string('ninea');
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
        Schema::dropIfExists('clientmoral');
    }
}
