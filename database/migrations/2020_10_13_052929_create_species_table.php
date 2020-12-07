<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->string('title')->primary();
            $table->string('description')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('species'))
        {
            DB::table('species')->insert(array('title'=>'Cão','description'=>'Mamífero carnívoro da família dos canídeos','genre'=>'Canino'));
            DB::table('species')->insert(array('title'=>'Gato','description'=>'Mamífero carnívoro da família dos felídeos','genre'=>'Felino'));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
