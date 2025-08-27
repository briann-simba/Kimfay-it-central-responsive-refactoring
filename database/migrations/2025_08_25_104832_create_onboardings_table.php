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
        Schema::create('onboardings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Linked once user is created
            $table->string('email')->unique(); // Email captured at start
            $table->enum('status', ['in_progress', 'completed', 'cancelled'])->default('in_progress');
            $table->integer('progress')->default(0); // percentage (0–100)
            $table->boolean('completed')->default(false); // quick flag
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboardings');
    }
};
