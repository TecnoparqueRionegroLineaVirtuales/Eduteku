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
        Schema::create('challenge_resourse', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_id');
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
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
        Schema::dropIfExists('challenge_resourse');
    }
};
