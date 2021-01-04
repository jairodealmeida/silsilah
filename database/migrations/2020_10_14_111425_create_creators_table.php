<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('broodtotal')->nullable(); //ninhada
            $table->date('certifyduedate')->nullable(); //validade certificado
            $table->string('title');
            $table->string('description')->nullable();
            $table->uuid('manager_id')->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        //DB::table('creators')->insert(array('id' => 1, 'broodtotal' => 20, 'certifyduedate' => '2020-10-11', 'title' => 'Criador Teste 1', 'description' =>'Descrição 1' ));
        //DB::table('creators')->insert(array('id' => 2, 'broodtotal' => 30, 'certifyduedate' => '2020-10-12', 'title' => 'Criador Teste 2', 'description' =>'Descrição 2' ));
        //DB::table('creators')->insert(array('id' => 3, 'broodtotal' => 25, 'certifyduedate' => '2020-10-13', 'title' => 'Criador Teste 3', 'description' =>'Descrição 3' ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creators');
    }
}
