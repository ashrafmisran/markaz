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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('debit_account_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('credit_account_id')->constrained('accounts')->cascadeOnDelete();
            $table->decimal('debit_amount', 15, 2);
            $table->decimal('credit_amount', 15, 2);
            $table->date('transaction_date')->nullable();
            $table->foreignId('creator_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
