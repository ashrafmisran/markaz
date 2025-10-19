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
            $table->string('mykad')->unique()->index();
            $table->string('old_ic')->unique()->nullable();
            $table->date('birthdate')->nullable();
            $table->foreignId('birthplace_state_id')->nullable()->constrained('states')->onDelete('set null');
            $table->string('email')->unique()->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->foreignId('father_id')->nullable()->constrained('people')->onDelete('set null');
            $table->foreignId('mother_id')->nullable()->constrained('people')->onDelete('set null');
            $table->string('race')->nullable();
            $table->string('religion')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->string('occupation')->nullable();
            $table->string('current_employer')->nullable();
            $table->string('photo_path')->nullable();
            $table->enum('highest_education_level', ['none', 'primary', 'secondary', 'diploma','bachelor','master','phd'])->nullable();
            $table->string('education_course')->nullable();
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
