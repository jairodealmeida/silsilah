<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('email');
            $table->string('phones');
            $table->integer('broodtotal');
            $table->date('certifyduedate');
            $table->string('aliastype');
            $table->uuid('proprietary');
            $table->string('description');
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
        Schema::dropIfExists('breeders');
    }
}
