<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('specie')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('groups'))
        {
            DB::table('groups')->insert(array('id' => 1,'title' => 'Esportistas', 'description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('id' => 2,'title' => 'Hounds', 'description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('id' => 3,'title' => 'Trabalhadores', 'description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('id' => 4,'title' => 'Pastores', 'description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('id' => 5,'title' => 'Terries', 'description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('id' => 6,'title' => 'Toys', 'description' => '','specie'=>'Cão'));
            DB::table('groups')->insert(array('id' => 7,'title' => 'Não-Esportistas', 'description' => '','specie'=>'Cão'));

            DB::table('groups')->insert(array('id' => 8,'title' => 'Persa', 'description' => '','specie'=>'Gato')); 
            DB::table('groups')->insert(array('id' => 9,'title' => 'Siamês', 'description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('id' => 10,'title' => 'Himalaia', 'description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('id' => 11,'title' => 'Maine Coon', 'description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('id' => 12,'title' => 'Angorá', 'description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('id' => 13,'title' => 'Siberiano', 'description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('id' => 14,'title' => 'Sphynx', 'description' => '','specie'=>'Gato'));
            DB::table('groups')->insert(array('id' => 15,'title' => 'Burmese', 'description' => '','specie'=>'Gato'));
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
