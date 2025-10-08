<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class AddDummyTeamForSuperadminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'superadmin@example.com')->first();

        if (! $user) {
            $this->command->info('superadmin@example.com not found, skipping dummy team creation.');
            return;
        }

        $team = Team::firstOrCreate([
            'name' => 'Dummy Organization',
            'owner_id' => $user->id,
        ]);

        if (! $team->members()->where('user_id', $user->id)->exists()) {
            $team->members()->attach($user->id);
        }

        $this->command->info('Dummy team created for superadmin: ' . $team->id);
    }
}
