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
            $table->foreignId('mykad')->constrained('people','mykad')->onDelete('cascade');
            $table->string('source')->nullable();
            $table->foreignId('kod_cula_id')->constrained('kod_cula','cula_code')->onDelete('cascade');
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
