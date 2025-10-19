<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parliament;

class ParliamentsSeeder extends Seeder
{
    public function run(): void
    {
        $parliaments = [
            [
                'name' => 'Jelebu',
                'code' => 'P126',
                'state_id' => 5,
            ],
            [
                'name' => 'Seremban',
                'code' => 'P128',
                'state_id' => 5,
            ],
            [
                'name' => 'Rembau',
                'code' => 'P131',
                'state_id' => 5,
            ],
            [
                'name' => 'Rasah',
                'code' => 'P130',
                'state_id' => 5,
            ],
            [
                'name' => 'Kuala Pilah',
                'code' => 'P129',
                'state_id' => 5,
            ],
            [
                'name' => 'Port Dickson',
                'code' => 'P132',
                'state_id' => 5,
            ],
            [
                'name' => 'Jempol',
                'code' => 'P127',
                'state_id' => 5,
            ],
            [
                'name' => 'Tampin',
                'code' => 'P133',
                'state_id' => 5,
            ],
        ];

        foreach ($parliaments as $parl) {
            Parliament::updateOrCreate(
                ['code' => $parl['code']],
                $parl
            );
        }
    }
}
