<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empleado::factory()->count(10)->create();
        Empleado::factory()->count(10)->create()->each(function ($empleado) {
            $dias_trabajados =  rand(0, 365);
            $sueldo_diario = rand(50, 200);
            $empleado->update([
                'fecha_nacimiento' => now()->subYears(rand(20, 60))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'dias_trabajados' => $dias_trabajados,
                'sueldo_diario' => $sueldo_diario,
                'sueldo' => $dias_trabajados * $sueldo_diario
            ]);
        });
    }
}
