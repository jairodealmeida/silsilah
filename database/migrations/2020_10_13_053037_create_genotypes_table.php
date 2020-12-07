<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

            $table->string('title')->primary();
            $table->string('description')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('genotypes'))
        {
            DB::table('genotypes')->insert(array('title' => 'Escaminha','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Laranja','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Tigrado','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Rajado','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Preto e branco','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Amarelo','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Branco','description' => ''));
            DB::table('genotypes')->insert(array('title' => 'Amarelo e branco','description' => ''));
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
