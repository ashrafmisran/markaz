<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dun;
use App\Models\Parliament;
use App\Models\State;

class DunSeeder extends Seeder
{
    public function run(): void
    {
        // ensure Negeri Sembilan state exists
        $state = State::where('name', 'Negeri Sembilan')->first();
        if (! $state) {
            $this->command->error('State "Negeri Sembilan" not found in states table. Please create it first.');
            return;
        }

        // list of all 36 DUN with parliament code mapping (source: 2023 Negeri Sembilan state election)
        $duns = [
            // P126 Jelebu
            ['name' => 'Chennah',       'code' => 'N01', 'parliament_code' => 'P126'],
            ['name' => 'Pertang',       'code' => 'N02', 'parliament_code' => 'P126'],
            ['name' => 'Sungai Lui',    'code' => 'N03', 'parliament_code' => 'P126'],
            ['name' => 'Klawang',       'code' => 'N04', 'parliament_code' => 'P126'],

            // P127 Jempol
            ['name' => 'Serting',       'code' => 'N05', 'parliament_code' => 'P127'],
            ['name' => 'Palong',        'code' => 'N06', 'parliament_code' => 'P127'],
            ['name' => 'Jeram Padang',  'code' => 'N07', 'parliament_code' => 'P127'],
            ['name' => 'Bahau',         'code' => 'N08', 'parliament_code' => 'P127'],

            // P128 Seremban
            ['name' => 'Lenggeng',      'code' => 'N09', 'parliament_code' => 'P128'],
            ['name' => 'Nilai',         'code' => 'N10', 'parliament_code' => 'P128'],
            ['name' => 'Lobak',         'code' => 'N11', 'parliament_code' => 'P128'],
            ['name' => 'Temiang',       'code' => 'N12', 'parliament_code' => 'P128'],
            ['name' => 'Sikamat',       'code' => 'N13', 'parliament_code' => 'P128'],
            ['name' => 'Ampangan',      'code' => 'N14', 'parliament_code' => 'P128'],

            // P129 Kuala Pilah
            ['name' => 'Juasseh',       'code' => 'N15', 'parliament_code' => 'P129'],
            ['name' => 'Seri Menanti',  'code' => 'N16', 'parliament_code' => 'P129'],
            ['name' => 'Senaling',      'code' => 'N17', 'parliament_code' => 'P129'],
            ['name' => 'Pilah',         'code' => 'N18', 'parliament_code' => 'P129'],
            ['name' => 'Johol',         'code' => 'N19', 'parliament_code' => 'P129'],

            // P130 Rasah
            ['name' => 'Labu',          'code' => 'N20', 'parliament_code' => 'P130'],
            ['name' => 'Bukit Kepayang','code' => 'N21', 'parliament_code' => 'P130'],
            ['name' => 'Rahang',        'code' => 'N22', 'parliament_code' => 'P130'],
            ['name' => 'Mambau',        'code' => 'N23', 'parliament_code' => 'P130'],
            ['name' => 'Seremban Jaya', 'code' => 'N24', 'parliament_code' => 'P130'],

            // P131 Rembau
            ['name' => 'Paroi',         'code' => 'N25', 'parliament_code' => 'P131'],
            ['name' => 'Chembong',      'code' => 'N26', 'parliament_code' => 'P131'],
            ['name' => 'Rantau',        'code' => 'N27', 'parliament_code' => 'P131'],
            ['name' => 'Kota',          'code' => 'N28', 'parliament_code' => 'P131'],

            // P132 Port Dickson
            ['name' => 'Chuah',         'code' => 'N29', 'parliament_code' => 'P132'],
            ['name' => 'Lukut',         'code' => 'N30', 'parliament_code' => 'P132'],
            ['name' => 'Bagan Pinang',  'code' => 'N31', 'parliament_code' => 'P132'],
            ['name' => 'Linggi',        'code' => 'N32', 'parliament_code' => 'P132'],
            ['name' => 'Sri Tanjung',   'code' => 'N33', 'parliament_code' => 'P132'],

            // P133 Tampin
            ['name' => 'Gemas',         'code' => 'N34', 'parliament_code' => 'P133'],
            ['name' => 'Gemencheh',     'code' => 'N35', 'parliament_code' => 'P133'],
            ['name' => 'Repah',         'code' => 'N36', 'parliament_code' => 'P133'],
        ];

        foreach ($duns as $d) {
            $parl = Parliament::where('code', $d['parliament_code'])->first();
            if (! $parl) {
                $this->command->error("Parliament {$d['parliament_code']} not found. Run ParliamentSeeder first.");
                continue;
            }

            Dun::updateOrCreate(
                ['code' => $d['code']],
                [
                    'name' => $d['name'],
                    'code' => $d['code'],
                    'parliament_id' => $parl->id,
                    // if your DUN table needs state_id too:
                    //'state_id' => $state->id,
                ]
            );
        }
    }
}
