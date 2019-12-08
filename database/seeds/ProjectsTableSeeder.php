<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();
        $project->nombre = "Sistema punto de ventas";
        $project->descripcion = "Crear la pagina web para la tienda online";
        $project->fechaInicio = "2019-09-12";
        $project->fechaCierre = "2019-11-24";
        $project->save();

        $project = new Project();
        $project->nombre = "Reloj Checador/Asistencia";
        $project->descripcion = "Crear una plataforma web para llevar el control de las entradas y salidas del taller de desarrollo del DASC";
        $project->fechaInicio = "2019-11-24";
        $project->fechaCierre = "2019-12-12";
        $project->save();
    }
}
