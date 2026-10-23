<?php

namespace Database\Seeders;

use App\Models\Dia;
use Illuminate\Database\Seeder;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::updateOrCreate(
            ['numero' => 1],
            ['fecha' => '2026-10-28']
        );

        Dia::updateOrCreate(
            ['numero' => 2],
            ['fecha' => '2026-10-29']
        );

        Dia::updateOrCreate(
            ['numero' => 3],
            ['fecha' => '2026-10-30']
        );
    }
}
