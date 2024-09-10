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
        Schema::create('bootcamp_resourse', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bootcamp_id');
            $table->foreign('bootcamp_id')->references('id')->on('bootcamp')->onDelete('cascade');
            $table->unsignedBigInteger('resourse_id');
            $table->foreign('resourse_id')->references('id')->on('resourse_bootcamp')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bootcamp_resourse');
    }
};
