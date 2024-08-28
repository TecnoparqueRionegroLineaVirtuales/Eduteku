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
        Schema::create('challenge_answers', function (Blueprint $table) {

            $table->unsignedBigInteger('challenge_id');
            $table->unsignedBigInteger('challenge_question_id');
            $table->string('content', 300);
            $table->timestamps();

            $table->foreign('challenge_id')->references('id')->on('challenges')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('challenge_question_id')->references('id')->on('challenge_questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_answers');
    }
};
