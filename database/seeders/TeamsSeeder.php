<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            'name' => 'Badan Perhubungan PAS Negeri Sembilan',
        ]);

        $dewan = ['Ulamak','Pemuda','Muslimat','Himpunan Pendokong','Assabiqun'];
        foreach($dewan as $d){
            DB::table('teams')->insert([
                'name' => 'Dewan '.$d.' PAS Negeri Sembilan',
            ]);
        }

        $kawasan =  ['Jelebu','Jempol','Seremban','Kuala Pilah','Rasah','Rembau','Port Dickson','Tampin'];
        foreach($kawasan as $k){
            // PAS Kawasan
            DB::table('teams')->insert([
                'name' => 'PAS Kawasan '.$k,
            ]);

            // Dewan kawasan
            foreach($dewan as $d){
                DB::table('teams')->insert([
                    'name' => 'Dewan '.$d.' PAS Kawasan '.$k,
                ]);
            }
        }
    }
}
