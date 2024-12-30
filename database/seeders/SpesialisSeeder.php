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
            'spesialis' => 'Industri dan Organisasi ',
        ]);
        SpesialisModel::create([
            'spesialis' => 'Klinis',
        ]);
        SpesialisModel::create([
            'spesialis' => 'Psikoterapi ',
        ]);
        SpesialisModel::create([
            'spesialis' => 'Perkembangan  ',
        ]);
    }
}
