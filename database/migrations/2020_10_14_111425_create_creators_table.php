<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->integer('broodtotal');
            $table->date('certifyduedate');
            $table->string('aliastype');
            $table->uuid('proprietary');
            $table->string('description');
            $table->string('manager_id')->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        //DB::table('creators')->insert(array('broodtotal' => 'name@domain.com','verified' => true));
        //DB::table('creators')->insert(array('email' => 'name@domain.com','verified' => true));
        //DB::table('creators')->insert(array('email' => 'name@domain.com','verified' => true));
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
