<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->enum('is_visible', ['is_visible', 'not_visible'])->default('is_visible');
            $table->enum('is_public', ['is_public', 'not_public'])->default('is_public');
            $table->string('name');
            $table->string('description');
            $table->string('news_id');
            $table->dateTime('datetime'); // Set the default value to current timestamp
            $table->longText('content'); // Use 'longText' for large text content
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
        Schema::dropIfExists('news');
    }
};
