<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_includes', function (Blueprint $table) {
            $table->id();
            // Birinci bölüm
            $table->string('name1_az');
            $table->string('name1_en')->nullable();
            $table->string('name1_ru')->nullable();
            $table->string('text1_az');
            $table->string('text1_en')->nullable();
            $table->string('text1_ru')->nullable();
            $table->text('description1_az');
            $table->text('description1_en')->nullable();
            $table->text('description1_ru')->nullable();
            $table->string('image1');
            
            // İkinci bölüm
            $table->string('name2_az');
            $table->string('name2_en')->nullable();
            $table->string('name2_ru')->nullable();
            $table->string('text2_az');
            $table->string('text2_en')->nullable();
            $table->string('text2_ru')->nullable();
            $table->text('description2_az');
            $table->text('description2_en')->nullable();
            $table->text('description2_ru')->nullable();
            
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_includes');
    }
};