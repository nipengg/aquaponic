<?php

namespace Database\Seeders;

use App\Models\PoolData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoolDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PoolData::create([
            'pool_id' => 1,
            'temper_val' => 20,
            'ph_val' => 30,
            'humidity_val' => 25,
            'oxygen_val' => 35,
            'tds_val' => 40,
            'turbidities_val' => 45,
        ]);
        PoolData::create([
            'pool_id' => 1,
            'temper_val' => 35,
            'ph_val' => 15,
            'humidity_val' => 50,
            'oxygen_val' => 20,
            'tds_val' => 60,
            'turbidities_val' => 80,
        ]);
    }
}
