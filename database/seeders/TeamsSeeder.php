<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            'name' => 'PAS Negeri Sembilan',
            'public_id' => Str::random(24),
        ]);

        DB::table('teams')->insert([
            'name' => 'Badan Perhubungan PAS Negeri Sembilan',
            'public_id' => Str::random(24),
        ]);

        $dewan = ['Ulamak','Pemuda','Muslimat','Himpunan Pendokong','Assabiqun'];
        foreach($dewan as $d){
            DB::table('teams')->insert([
                'name' => 'Dewan '.$d.' PAS Negeri Sembilan',
                'public_id' => Str::random(24),
            ]);
        }

        $kawasan =  ['Jelebu','Jempol','Seremban','Kuala Pilah','Rasah','Rembau','Port Dickson','Tampin'];
        foreach($kawasan as $k){
            // PAS Kawasan
            DB::table('teams')->insert([
                'name' => 'PAS Kawasan '.$k,
                'public_id' => Str::random(24),
            ]);

            // Dewan kawasan
            foreach($dewan as $d){
                DB::table('teams')->insert([
                    'name' => 'Dewan '.$d.' PAS Kawasan '.$k,
                    'public_id' => Str::random(24),
                ]);
            }
        }
    }
}
