<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class SampleTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            $this->command->info('No users found, skipping team seeding.');
            return;
        }

        $team = Team::firstOrCreate([
            'name' => 'Sample Team',
            'owner_id' => $user->id,
        ]);

        // Attach the user to the team if not already attached
        if (! $team->members()->where('user_id', $user->id)->exists()) {
            $team->members()->attach($user->id);
        }

        $this->command->info('Seeded Sample Team and attached user id: ' . $user->id);
    }
}
