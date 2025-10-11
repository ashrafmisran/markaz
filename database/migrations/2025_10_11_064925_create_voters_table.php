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
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mykad')->constrained('people','mykad')->onDelete('cascade')->unique();
            $table->string('name');
            $table->string('house_no')->nullable();
            $table->foreignId('locality_id')->nullable()->constrained('localities')->onDelete('set null');
            $table->foreignId('daerah_mengundi_id')->nullable()->constrained('daerah_mengundi')->onDelete('set null');
            $table->foreignId('dun_id')->nullable()->constrained('duns')->onDelete('set null');
            $table->foreignId('parliament_id')->nullable()->constrained('parliaments')->onDelete('set null');
            $table->integer('saluran')->nullable();
            $table->integer('no_siri')->nullable();
            $table->boolean('has_voted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
