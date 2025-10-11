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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mykad')->unique();
            $table->date('birthdate')->nullable();
            $table->foreignId('birthplace_id')->nullable()->constrained('state')->onDelete('set null');
            $table->string('email')->unique()->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->foreignId('father_id')->nullable()->constrained('people')->onDelete('set null');
            $table->foreignId('mother_id')->nullable()->constrained('people')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
