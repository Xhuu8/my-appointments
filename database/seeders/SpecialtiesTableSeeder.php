<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $specialties = [
            'Pediatra',
            'Neurologia',
            'Cardiologia',
            'Entrologia'
        ];

        foreach ($specialties as $specialty) {
            Specialty::create([
                'name' => $specialty,
                'description' => 'descripcion'
            ]);
        }
    }
}
