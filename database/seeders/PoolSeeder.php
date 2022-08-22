<?php

namespace Database\Seeders;

use App\Models\Pool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pool::create([
            'name' => 'Kolam 1',
            'area' => '1',
            'desc' => 'Ikan Lele',
        ]);
    }
}
