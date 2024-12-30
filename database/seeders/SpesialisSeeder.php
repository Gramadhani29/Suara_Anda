<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpesialisModel;
class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpesialisModel::create([
            'spesialis' => 'Dokter Umum',
        ]);
        SpesialisModel::create([
            'spesialis' => 'Dokter Gigi',
        ]);
        SpesialisModel::create([
            'spesialis' => 'Dokter Anak',
        ]);
    }
}
