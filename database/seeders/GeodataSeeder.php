<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regione;
use App\Models\Provincia;
use App\Models\Comune;

class GeodataSeeder extends Seeder
{
    public function run()
    {
        Regione::factory(25)->create();

        foreach (Regione::all() as $regione) {
            Provincia::factory(5)->create([
                'regione_id' => $regione->id,
            ]);
        }

        foreach (Provincia::all() as $provincia) {
            Comune::factory(15)->create([
                'provincia_id' => $provincia->id,
            ]);
        }
    }
}
