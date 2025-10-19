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
        Schema::create('people_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_mykad')->constrained('people','mykad','mykad')->onDelete('cascade');
            $table->string('report_type');
            $table->text('report_details');
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_reports');
    }
};
