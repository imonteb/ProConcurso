<?php

namespace Database\Seeders;

use App\Models\Cpostal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CpostalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ruta al archivo districts.txt
        $filePath = base_path('database/seeders/data/PT.txt');

        // Verificar si el archivo existe
        if (File::exists($filePath)) {
            // Leer el contenido del archivo
            $content = File::get($filePath);
            $lines = explode("\n", $content); // Dividir el contenido por líneas

            foreach ($lines as $line) {
                $data = explode('\t', $line); // Dividir cada línea por el delimitador ";"

                if (count($data) === 12) {
                    // Insertar los datos en la tabla districts
                    Cpostal::create([
                        'country_code' => trim($data[0]), 
                        'postal_code' => trim($data[1]), 
                        'place_name' => trim($data[2]), 
                        'state_name' => trim($data[3]), 
                        'state_code' => trim($data[4]), 
                        'county_name' => trim($data[5]), 
                        'county_code' => trim($data[6]), 
                        'community' => trim($data[7]), 
                        'community_code' => trim($data[8]), 
                        'latitude' => trim($data[9]), 
                        'longitude' => trim($data[10]), 
                        'accuracy' => trim($data[11]), 
                    ]);
                }else {
                    echo "Error: La línea no tiene el formato esperado: " . $line . "\n";
                }
            }

            echo "¡Seeding completado exitosamente!";
        } else {
            echo "Archivo no encontrado en: " . $filePath;
        }
    }
}
