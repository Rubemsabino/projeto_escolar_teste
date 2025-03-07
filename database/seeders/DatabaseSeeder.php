<?php

namespace Database\Seeders;

Use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AlunoSeeder::class);
        $this->call(ProfessorSeeder::class);
        $this->call(CoordenadoraSeeder::class);
    }
}
