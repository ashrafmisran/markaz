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
        Schema::create('cula', function (Blueprint $table) {
            $table->id();
            $table->string('mykad',12)->unique();
            $table->foreign('mykad')->references('mykad')->on('people')->onDelete('cascade');
            $table->string('source')->nullable();
            $table->string('kod_cula', 50)->nullable(); // length as needed
            $table->foreign('kod_cula')->references('cula_code')->on('kod_cula')->onDelete('cascade');
            $table->string('remark')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cula');
    }
};
