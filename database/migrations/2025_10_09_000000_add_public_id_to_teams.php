<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('public_id', 64)->unique()->nullable()->after('id');
        });

        // backfill existing teams
        if (Schema::hasTable('teams')) {
            \App\Models\Team::query()->whereNull('public_id')->get()->each(function ($team) {
                $team->public_id = Illuminate\Support\Str::random(24);
                $team->save();
            });
        }
    }

    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('public_id');
        });
    }
};
