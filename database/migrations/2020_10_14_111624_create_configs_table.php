<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('club');
            $table->string('stamp'); // carimbo
            $table->string('prefix');
            $table->string('register');
            $table->string('lastpedigree');
            $table->string('margintop');
            $table->string('marginleft');
            $table->string('registerinfotitle');
            $table->string('registerinfomessage');
            $table->string('whatsapptitle');
            $table->string('whatsappmessage');
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
        Schema::dropIfExists('configs');
    }
}
