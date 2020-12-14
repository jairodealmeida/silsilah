<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CreateGenotypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genotypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('genotypes'))
        {
            DB::table('genotypes')->insert(array('id' => 1, 'title' => 'Escaminha', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 2, 'title' => 'Laranja', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 3, 'title' => 'Tigrado', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 4, 'title' => 'Rajado', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 5, 'title' => 'Preto e branco', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 6, 'title' => 'Amarelo', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 7, 'title' => 'Branco', 'description' => ''));
            DB::table('genotypes')->insert(array('id' => 8, 'title' => 'Amarelo e branco', 'description' => ''));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genotypes');
    }
}
