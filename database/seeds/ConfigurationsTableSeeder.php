<?php

use Illuminate\Database\Seeder;
use App\Configuracion;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuration = new Configuracion();
        $configuration->segundos = 15;
        $configuration->save();
    }
}
