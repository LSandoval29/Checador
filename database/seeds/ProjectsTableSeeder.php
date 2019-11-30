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
    }
}
