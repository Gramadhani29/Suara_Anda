<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\HariModel;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HariModel::create([
            'hari' => 'Senin',
        ]);
        HariModel::create([
            'hari' => 'Selasa',
        ]);
        HariModel::create([
            'hari' => 'Rabu',
        ]);
        HariModel::create([
            'hari' => 'Kamis',
        ]);
        HariModel::create([
            'hari' => 'Jumat',
        ]);
        HariModel::create([
            'hari' => 'Sabtu',
        ]);
        HariModel::create([
            'hari' => 'Minggu',
        ]);
    }
}
