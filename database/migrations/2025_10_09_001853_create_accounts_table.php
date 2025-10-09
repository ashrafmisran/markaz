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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->enum('category', ['asset', 'liability', 'equity', 'income', 'expense']);
            $table->string('code_no')->nullable();
            $table->string('name')->index();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('initial_balance', 15, 2)->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
