<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMessagesDataTable extends Migration
{
    public function up()
    {
        Schema::create('contact_messages_data', function (Blueprint $table) {
            $table->id();
            $table->text('message_az');
            $table->text('message_en')->nullable();
            $table->text('message_ru')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_messages_data');
    }
} 