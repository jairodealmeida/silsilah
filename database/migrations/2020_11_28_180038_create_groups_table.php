<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('specie')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('groups'))
        {
            DB::table('groups')->insert(array('title' => 'Esportistas','description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('title' => 'Hounds','description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('title' => 'Trabalhadores','description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('title' => 'Pastores','description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('title' => 'Terries','description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('title' => 'Toys','description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('title' => 'Não-Esportistas','description' => '','specie'=>'Cão'));

            DB::table('groups')->insert(array('title' => 'Persa','description' => '','specie'=>'Gato')); 
            DB::table('groups')->insert(array('title' => 'Siamês','description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('title' => 'Himalaia','description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('title' => 'Maine Coon','description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('title' => 'Angorá','description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('title' => 'Siberiano','description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('title' => 'Sphynx','description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('title' => 'Burmese','description' => '','specie'=>'Gato'));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
