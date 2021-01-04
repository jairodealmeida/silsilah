<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('specie_id')->nullable();
            $table->uuid('race_id')->nullable();
            $table->string('genotype')->nullable();
            $table->uuid('pedigree_id')->nullable();
            $table->uuid('office_id')->nullable();
            $table->uuid('proprietary_id')->nullable();
            $table->uuid('manager_id')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
