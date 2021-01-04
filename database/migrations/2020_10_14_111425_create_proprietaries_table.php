<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
class CreateProprietariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); 
            $table->string('cpf')->nullable(); 
            $table->string('rg')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();   
            $table->string('num_address')->nullable(); 
            $table->string('comp_address')->nullable(); 
            $table->string('cep')->nullable();
            $table->uuid('manager_id')->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        //DB::table('proprietaries')->insert(array('id' => 1, 'name' => 'Jairo', 'cpf' => '2111112222', 'rg' => '233333333', 'phone' =>'018996619813', 'mobile' =>'018996619813', 'address' =>'Rua Av Campinas', 'num_address' =>'123', 'comp_address' =>'Casa', 'cep' =>'19800-000' ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proprietaries');
    }
}
