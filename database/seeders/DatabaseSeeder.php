<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CreateSuperAdminSeeder::class,
            StatesSeeder::class,
            DivisionsSeeder::class,
            TeamsSeeder::class,
            AccountsSeeder::class, // Make default ledger accounts for all teams
            PeopleSeeder::class,
            ParliamentsSeeder::class,
            DunSeeder::class,
        ]);
    }
}
