<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DivisionsSeeder extends Seeder
{
    public function run(): void
    {
        if (! Schema::hasTable('divisions')) {
            $this->command->error('Table `divisions` does not exist.');
            return;
        }

        // find Negeri Sembilan state id
        $stateId = DB::table('states')->where('name', 'Negeri Sembilan')->value('id');
        if (! $stateId) {
            $this->command->error('State "Negeri Sembilan" not found in states table. Run StatesSeeder first.');
            return;
        }

        $now = Carbon::now();

        $divisions = [
            ['id' => 126, 'name' => 'Jelebu'],
            ['id' => 127, 'name' => 'Jempol'],
            ['id' => 128, 'name' => 'Seremban'],
            ['id' => 129, 'name' => 'Kuala Pilah'],
            ['id' => 130, 'name' => 'Rasah'],
            ['id' => 131, 'name' => 'Rembau'],
            ['id' => 132, 'name' => 'Port Dickson'],
            ['id' => 133, 'name' => 'Tampin'],
        ];

        foreach ($divisions as $div) {
            $exists = DB::table('divisions')->where('id', $div['id'])->orWhere('name', $div['name'])->exists();
            if ($exists) {
                $this->command->info("Division already exists: {$div['name']} ({$div['id']})");
                continue;
            }

            DB::table('divisions')->insert([
                'id' => $div['id'],
                'name' => $div['name'],
                'state_id' => $stateId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $this->command->info("Inserted division: {$div['name']} ({$div['id']})");
        }
    }
}
