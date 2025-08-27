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
        Schema::create('onboarding_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('onboarding_id');
            $table->integer('step_number'); // 1 = personal info, 2 = documents...
            $table->string('step_name'); // e.g. "personal_info", "documents", "orientation"
            $table->string('status')->default('pending'); // pending | in_progress | completed
            $table->unsignedBigInteger('updated_by')->nullable(); // HR who last worked on this step
            $table->timestamps();

            $table->foreign('onboarding_id')->references('id')->on('onboardings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboarding_steps');
    }
};
