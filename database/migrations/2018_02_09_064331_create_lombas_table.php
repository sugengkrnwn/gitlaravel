<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Lomba;

class CreateLombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lombas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->string('deskripsi')->nullable();
            $table->date('tanggal_tutup')->nullable();
            $table->string ('poster')->nullable();
            $table->timestamps();
        });

        //Faker
        $faker=Faker\factory::create();
            for($i=0; $i<30; $i++){
                $lomba = new Lomba();
                $lomba->nama = $faker->word;
                $lomba->deskripsi = $faker->realText($maxNbChars = 191, $indexSize = 2);
                $lomba->tanggal_tutup = $faker->date($format = 'Y-m-d', $max = '+ 5 years');
                $lomba->poster = $faker->imageUrl($width = 600, $height = 400 , 'sports'); 
                $lomba->save();
            } 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lombas');
    }
}
