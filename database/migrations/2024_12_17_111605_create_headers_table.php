<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            // 7 metin alanı, her biri 3 dilde
            $table->string('homepage_title_az')->nullable() ; // Azerice ana sayfa başlığı
            $table->string('homepage_title_en')->nullable(); // İngilizce ana sayfa başlığı
            $table->string('homepage_title_ru')->nullable(); // Rusça ana sayfa başlığı

            $table->string('about_title_az')->nullable(); // Azerice hakkında başlığı
            $table->string('about_title_en')->nullable(); // İngilizce hakkında başlığı
            $table->string('about_title_ru')->nullable(); // Rusça hakkında başlığı

            $table->string('services_title_az')->nullable(); // Azerice hizmetler başlığı
            $table->string('services_title_en')->nullable(); // İngilizce hizmetler başlığı
            $table->string('services_title_ru')->nullable(); // Rusça hizmetler başlığı

            $table->string('blog_title_az')->nullable(); // Azerice blog başlığı
            $table->string('blog_title_en')->nullable(); // İngilizce blog başlığı
            $table->string('blog_title_ru')->nullable(); // Rusça blog başlığı

            $table->string('testimonials_title_az')->nullable() ; // Azerice müşteri yorumları başlığı
            $table->string('testimonials_title_en')->nullable(); // İngilizce müşteri yorumları başlığı
            $table->string('testimonials_title_ru')->nullable(); // Rusça müşteri yorumları başlığı

            $table->string('experience_title_az')->nullable(); // Azerice deneyim başlığı
            $table->string('experience_title_en')->nullable(); // İngilizce deneyim başlığı
            $table->string('experience_title_ru')->nullable(); // Rusça deneyim başlığı

            $table->string('contact_title_az')->nullable(); // Azerice iletişim başlığı
            $table->string('contact_title_en')->nullable(); // İngilizce iletişim başlığı
            $table->string('contact_title_ru')->nullable(); // Rusça iletişim başlığı

            $table->string('logo')->nullable(); // Logo alanı
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
        Schema::dropIfExists('headers');
    }
}