<?php

namespace Database\Seeders;

Use App\Models\Coordenadora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordenadoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coordenadora::factory(10)->create();
    }
}
