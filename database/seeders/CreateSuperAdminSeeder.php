<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'superadmin']);

        $user = User::firstOrCreate([
            'email' => 'ashrafmisran@gmail.com',
        ], [
            'name' => 'Muhammad Ashraf bin Misran',
            'mykad' => '911101065717',
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password123')),
        ]);

        // Attach the user to Badan Perhubungan PAS Negeri Sembilan team and Dewan Pemuda PAS Kawasan Seremban team

                
        $team = Team::first();
        if (! $team) {
            $team = Team::create(['name' => 'Badan Perhubungan PAS Negeri Sembilan', 'owner_id' => $user->id ?? 1]);
        }

        $team2 = Team::where('name', 'Dewan Pemuda PAS Kawasan Seremban')->first();
        if (! $team2) {
            $team2 = Team::create(['name' => 'Dewan Pemuda PAS Kawasan Seremban', 'owner_id' => $user->id ?? 1]);
        }
        $user->teams()->syncWithoutDetaching([$team->id, $team2->id]);

        // When Spatie teams are enabled, set the registrar's permissions team id
        $registrar = app(\Spatie\Permission\PermissionRegistrar::class);
        $registrar->setPermissionsTeamId($team->id);

        if (! $user->hasRole('superadmin')) {
            $user->assignRole('superadmin');
        }

        // Clear the team id afterwards to avoid side-effects for other operations
        $registrar->setPermissionsTeamId(null);

        $this->command->info('Superadmin user created/updated: ' . $user->email . ' (team id: ' . $team->id . ')');
    }
}
