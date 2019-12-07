<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;
use Auth;

class configuracionController extends Controller
{
    public function getSegundos(){
        $configuration = Configuration::find(1);
        return $configuration->segundos;
    }
}
