<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string ('role')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

   

     //FAKER USER
     $faker=Faker\factory::create();
     for($i=0; $i<30; $i++){
         $user = new User();
         $user->name = $faker->name;
         $user->email = $faker->unique()->email;
         $user->password = bcrypt('rahasia');
         $user->role = 'users';
         $user->save();
 } 
 //


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
