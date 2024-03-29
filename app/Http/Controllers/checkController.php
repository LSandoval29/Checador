<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use App\Check;
use App\User;
use Auth;


class checkController extends Controller
{
    public function index(Request $request){

		$usuario = User::where('matricula', $request['matricula'])->where('status','active')->get()->first();
	
		if(empty($usuario)){
			return redirect()->back()->with('error','No existe ese usuario');
		}else{
			$idUsuario = $usuario->id;
			$check = Check::where('status','no_concluida')->where('userId', $idUsuario)->get();
			$checks = $usuario->checks()->whereStatus('no_concluida')->get()->count();//Numero total de checks
            $numProyectosUsuario = $usuario->projects()->get()->count();//Numero total de proyectos
			//Crear un nuevo check si no hay uno creado:
			if(empty($check->last())){
				
				$check = new Check();
		    	$check->userId = $idUsuario;
		    	$check->horaEntrada = date('H:i:s');
		    	$check->horaSalida = date('H:i:s');
		    	$check->fecha = date('Y-m-d');
		    	$check->duracion = date('H:i:s');
		    	$checkEntrada = true;
		    	if($check->save()){
		    		return view('checador.index', compact('usuario','checkEntrada', 'checks','numProyectosUsuario','check'));
		    	}
			}else{
				//si no se ha concluido la actividad, checar la salida:
				$idCheckPendiente =  $check->last()->id;
				$check = Check::find($idCheckPendiente);
				//verificar que el check se hizo el mismo dia:
				if($check->fecha == date('Y-m-d')){
					$entrada = new DateTime($check->horaEntrada);
					$salida = new DateTime(date('H:i:s'));
					$duracion = $entrada->diff($salida);
					$check->horaSalida = date('H:i:s');
					$check->duracion = $duracion->format('%H:%i:%s');
					$check->status = "concluida";
				}else{
					$check->horaSalida = "00:00:00";
					$check->duracion = "00:00:00";
					$check->status = "noAceptado";
				}
				
				if($check->save()){
					//mandar actualizados los checks(UPDATE)
					$checks = $usuario->checks()->whereStatus('concluida')->get()->count();
					return view('checador.index', compact('usuario','checks','numProyectosUsuario','check'));
				}
			}
		}
	} 
}

