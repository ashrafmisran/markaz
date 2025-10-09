<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StatesSeeder extends Seeder
{
    public function run(): void
    {
        if (! Schema::hasTable('states')) {
            $this->command->error('Table `states` does not exist.');
            return;
        }

        $now = Carbon::now();

        $states = [
            'Johor',
            'Kedah',
            'Kelantan',
            'Melaka',
            'Negeri Sembilan',
            'Pahang',
            'Perak',
            'Perlis',
            'Pulau Pinang',
            'Selangor',
            'Terengganu',
            'Sabah',
            'Sarawak',
            'Wilayah Persetuan'
        ];

        foreach ($states as $name) {
            $exists = DB::table('states')->where('name', $name)->exists();
            if ($exists) {
                $this->command->info("State already exists: {$name}");
                continue;
            }

            DB::table('states')->insert([
                'name' => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $this->command->info("Inserted state: {$name}");
        }
    }
}
