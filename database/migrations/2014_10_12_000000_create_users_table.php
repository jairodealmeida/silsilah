<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nickname');
            $table->string('name')->nullable();
            $table->boolean('gender_id')->default(0);
            $table->uuid('father_id')->nullable();
            $table->uuid('mother_id')->nullable();
            $table->uuid('parent_id')->nullable();
            $table->date('dob')->nullable();
            $table->year('yob')->nullable();
            $table->unsignedTinyInteger('birth_order')->nullable();
            $table->date('dod')->nullable();
            $table->year('yod')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo_path')->nullable();
            $table->uuid('manager_id')->nullable();
            $table->rememberToken();
            $table->boolean('admin')->default(0);
            $table->uuid('creator_id')->nullable();
            $table->uuid('animal_id')->nullable();
            $table->uuid('office_id')->nullable();
            $table->timestamps();
        });
        //usuario: jairodealmeida@gmail.com.br
        //senha: gatobras@2020
        // Insert some stuff
        if (Schema::hasTable('users'))
        {
            DB::table('users')->insert(array('id'=>1, 'nickname' => 'Matriz Gatobras SP','admin' => true, 'name'=>'Eduardo','email'=>'eduardo@gatobras.com.br', 'password'=>'$2y$10$0dzDUrjfR7gkSTXxAf4JauQ.irmNqgzv/3Ui60yrsdZJBg8Avm63a'));
            DB::table('users')->insert(array('id'=>2, 'nickname' => 'Administrador','admin' => true, 'name'=>'Admin','email'=>'jairodealmeida@gmail.com', 'password'=>'$2y$10$0dzDUrjfR7gkSTXxAf4JauQ.irmNqgzv/3Ui60yrsdZJBg8Avm63a'));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
