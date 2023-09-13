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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Add 'name' column
            $table->tinyText('tiny_description'); // Add 'name' column
            $table->text('description'); // Add 'description' column
            $table->string('gif'); // Add 'gif' column
            $table->string('tiny_image'); // Add 'gif' column
            $table->enum('is_visible', ['is_visible', 'not_visible'])->default('is_visible'); // Set the default value here
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
        Schema::dropIfExists('sections');
    }
};
