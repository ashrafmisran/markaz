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
            'email' => 'admin@pasn9.org',
        ], [
            'name' => 'Muhammad Ashraf bin Misran',
            'mykad' => '911101065717',
            'password' => Hash::make('password'),
        ]);

        // Ensure there's a team to attach the role to (Spatie teams enabled)
        $team = Team::first();
        if (! $team) {
            $team = Team::create(['name' => 'Jabatan IT PAS Negeri Sembilan', 'owner_id' => $user->id ?? 1]);
            $team->members()->attach($user->id);
        }

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
