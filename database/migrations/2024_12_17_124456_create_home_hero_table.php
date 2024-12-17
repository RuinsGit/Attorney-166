<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeHeroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_hero', function (Blueprint $table) {
            $table->id();
            // Text alanları
            $table->string('text_az')->nullable(); // Azerice metin
            $table->string('text_en')->nullable(); // İngilizce metin
            $table->string('text_ru')->nullable(); // Rusça metin

            // Description alanları
            $table->text('description_az')->nullable(); // Azerice açıklama
            $table->text('description_en')->nullable(); // İngilizce açıklama
            $table->text('description_ru')->nullable(); // Rusça açıklama

            // Number alanları
            $table->string('number_az')->nullable(); // Azerice numara
            $table->string('number_en')->nullable(); // İngilizce numara
            $table->string('number_ru')->nullable(); // Rusça numara

            // Text2 alanları
            $table->string('text2_az')->nullable(); // Azerice ikinci metin
            $table->string('text2_en')->nullable(); // İngilizce ikinci metin
            $table->string('text2_ru')->nullable(); // Rusça ikinci metin

            // Mail alanları
            $table->string('mail_az')->nullable(); // Azerice mail
            $table->string('mail_en')->nullable(); // İngilizce mail
            $table->string('mail_ru')->nullable(); // Rusça mail

            // Resim alanları (dil versiyonu olmadan)
            $table->string('image')->nullable(); // Resim
            $table->string('background_image')->nullable(); // Arka plan resmi

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
        Schema::dropIfExists('home_hero');
    }
}