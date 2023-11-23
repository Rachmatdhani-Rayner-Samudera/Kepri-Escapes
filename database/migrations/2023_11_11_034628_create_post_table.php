<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_post', function (Blueprint $table) {
            $table->id();
            $table->string('creator');
            $table->foreignId('category_id');
            $table->string('post_title');
            $table->text ('post_content');
            $table->string('slug')->nullable();
            $table->string('post_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_post');
    }
};
