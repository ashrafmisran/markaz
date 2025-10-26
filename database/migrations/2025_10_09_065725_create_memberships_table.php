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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable(); // Only if has account
            $table->string('name');
            $table->string('mykad')->nullable();
            $table->string('old_ic')->nullable();
            $table->string('sex')->nullable();
            $table->integer('membership_no')->unique();
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('division_id')->constrained('divisions');
            $table->foreignId('branch_id')->constrained('branches')->nullable();
            $table->string('status');
            $table->enum('fee_type', ['lifetime', 'annual']);
            $table->date('joined_since');
            $table->string('address')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
