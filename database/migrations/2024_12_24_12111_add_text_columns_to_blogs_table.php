<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextColumnsToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('text_az')->default(''); // Varsayılan değer belirlendi
            $table->text('text_en')->default(''); // Varsayılan değer belirlendi
            $table->text('text_ru')->default(''); // Varsayılan değer belirlendi
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['text_az', 'text_en', 'text_ru']); // Metin alanlarını kaldır
        });
    }
} 