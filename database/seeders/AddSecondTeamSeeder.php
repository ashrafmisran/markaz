<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class AddSecondTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        if (! $user) {
            $this->command->info('User id 1 not found, skipping second team seeding.');
            return;
        }

        $team = Team::firstOrCreate([
            'name' => 'Second Team',
            'owner_id' => $user->id,
        ]);

        if (! $team->members()->where('user_id', $user->id)->exists()) {
            $team->members()->attach($user->id);
        }

        $this->command->info('Seeded Second Team and attached user id: ' . $user->id);
    }
}
