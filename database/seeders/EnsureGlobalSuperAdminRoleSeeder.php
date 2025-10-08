<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class EnsureGlobalSuperAdminRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure a global (no team) superadmin role exists
        $role = Role::firstOrCreate([
            'name' => 'superadmin',
            'team_id' => null,
        ]);

        $user = User::firstOrCreate([
            'email' => 'superadmin@example.com',
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
        ]);

        // Temporarily disable team resolver so role is assigned globally
        $registrar = app(\Spatie\Permission\PermissionRegistrar::class);
        $registrar->setPermissionsTeamId(null);

        if (! $user->hasRole('superadmin')) {
            $user->assignRole('superadmin');
        }

        $this->command->info('Ensured global superadmin role on: ' . $user->email);
    }
}
