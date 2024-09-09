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
        Schema::create('challenge_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_type_id');
            $table->unsignedBigInteger('question_type_id');
            $table->string('content');
            $table->timestamps();

            $table->foreign('challenge_type_id')->references('id')->on('challenge_types')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('question_type_id')->references('id')->on('question_types')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_questions');
    }
};
