<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JamModel;

class JamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JamModel::create([
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:00',
        ]);
        JamModel::create([
            'jam_mulai' => '09:00',
            'jam_selesai' => '10:00',
        ]);
        JamModel::create([
            'jam_mulai' => '10:00',
            'jam_selesai' => '11:00',
        ]);
    }
}
