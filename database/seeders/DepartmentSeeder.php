<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'department_name' => 'Administrativo',
                'department_description' => 'Encargados de la administração.',
                
            ],
            [
                'department_name' => 'Recursos humanos',
                'department_description' => 'Encargados de a admissão e demissão de funcionários, a seleção e o recrutamento e a atenção às exigências e leis trabalhistas. ',
                
            ],
            [
                'department_name' => 'Marketing',
                'department_description' => 'Encargados de las actividades promocionales.',
                
            ],
            [
                'department_name' => 'Operaciones',
                'department_description' => 'Supervisión de las actividades diarias.',
                
            ],
            [
                'department_name' => 'Projetos de engenharia',
                'department_description' => 'Planeamento e desenvolvimento de projetos de engenharia.',
                
            ],
        ]);
        
    }
}
