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
        PoolData::create([
            'pool_id' => 1,
            'temper_val' => 29,
            'ph_val' => 6.5,
            'humidity_val' => 58,
            'oxygen_val' => 21,
            'tds_val' => 63,
            'turbidities_val' => 89,
        ]);
        PoolData::create([
            'pool_id' => 1,
            'temper_val' => 26,
            'ph_val' => 6.9,
            'humidity_val' => 53,
            'oxygen_val' => 22,
            'tds_val' => 64,
            'turbidities_val' => 83,
        ]);
        PoolData::create([
            'pool_id' => 1,
            'temper_val' => 23,
            'ph_val' => 6.8,
            'humidity_val' => 51,
            'oxygen_val' => 19,
            'tds_val' => 61,
            'turbidities_val' => 82,
        ]);
    }
}
