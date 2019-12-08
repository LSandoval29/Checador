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

    public function update(Request $request){
    	if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Editar usuarios') ){
    		$configuration = Configuration::find(1);
    		$configuration->segundos = $request['segundos'];
    		if($configuration->save()){
    			return redirect()->back()->with('success','ok');
    		}
    		return redirect()->back()->with('error','No se pudo actualizar');
    	}else{
    		return redirect()->back()->with('error','No permitido'); 
    	}
    }
}
