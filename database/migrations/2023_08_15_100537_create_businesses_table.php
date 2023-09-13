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
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Add 'image' column
            $table->string('name'); // Add 'name' column
            $table->text('description');
            $table->enum('is_visible', ['is_visible', 'not_visible'])->default('is_visible'); // Set the default value here
            $table->string('youtube_link')->nullable();
            $table->string('news_id');
            $table->dateTime('datetime'); // Set the default value to current timestamp
            $table->longText('content'); // Use 'longText' for large text content
            $table->enum('is_public', ['is_public', 'not_public'])->default('is_public');
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
        Schema::dropIfExists('business');
    }
};
