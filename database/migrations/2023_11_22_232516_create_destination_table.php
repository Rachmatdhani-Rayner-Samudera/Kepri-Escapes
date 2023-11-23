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
        Schema::create('tb_destination', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->foreignId('category_d_id');
            $table->integer('package_price');
            $table->string('time');
            $table->text ('package_content');
            $table->string('slug')->nullable();
            $table->string('package_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_destination');
    }
};
