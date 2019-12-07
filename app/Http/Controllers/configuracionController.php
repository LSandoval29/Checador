<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use Auth;

class configuracionController extends Controller
{
    public function getSegundos(){
        $configuration = Configuracion::find(1);
        return $configuration->segundos;
    }
}
