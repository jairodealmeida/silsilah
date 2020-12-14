<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('classe')->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('species'))
        {
            DB::table('species')->insert(array('id'=>1,'title'=>'Cão','description'=>'Mamífero carnívoro da família dos canídeos','classe'=>'Mamíferos'));
            DB::table('species')->insert(array('id'=>2,'title'=>'Gato','description'=>'Mamífero carnívoro da família dos felídeos','classe'=>'Mamíferos'));
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
