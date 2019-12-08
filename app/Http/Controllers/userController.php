<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use App\Project;
use Auth;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Visualizar usuarios')){

            $users = User::where('status','active')->get();
            $section_name = "Lista de usuarios registrados";

            return view('admin.users.index',compact('users','section_name'));

        }

        return redirect()->back()->with('error', 'No Permitido'); 
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function store(Request $request)
    {   
        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
        Auth::user()->hasPermissionTo('Agregar usuarios')){

            $request['password'] = bcrypt($request['password']);

            if (User::create($request->all())) {
                return redirect()->back()->with('success', 'ok');
            }

            return redirect()->back()->with('error', 'ok'); 
        } 
        return redirect()->back()->with('error', 'No Permitido');
    }

    public function update(Request $request)
    {   
        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Editar usuarios')){
            
            $user = null;

            if ($user = User::find($request['id'])) {
                if (isset($request['password']) && $request['password']!='') {
                    $request['password']= bcrypt($request['password']);
                }else{
                    $request['password']= $user->password;
                } 

                if ($user->update($request->all())) {

                   return redirect()->back()->with('success', 'ok');
                }

            }
            return redirect()->back()->with('error', 'ok'); 
        }
        return redirect()->back()->with('error', 'No Permitido');

    }

    public function destroy($user_id)
    {

        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Eliminar usuarios')){
            
            $user = null;

            if ($user = User::find($user_id)) {
                $user->status = "inactive";
                $user->password = "ELIMINADO";

                if ($user->save()) {

                    return  response()->json([
                        'message' => 'Registro eliminado correctamente',
                        'code' => 2,
                        'data' => null
                    ], 200);
                }


            }
        }   
    }

    public function detail($id=null)
    {
        $usuario = User::find($id);
        if(empty($usuario)){
            $usuario = Auth::user();
        }
    
        $proyectos = Project::where('status','active')->get();
        $checks = $usuario->checks()->whereStatus('no_concluida')->get()->count();
        $numProyectosUsuario = $usuario->projects()->get()->count();
        $misProyectos = $usuario->projects()->get();
        $infoChecks = $usuario->checks()->whereStatus('concluida')->orderBy('id','desc')->limit(4)->get();
        return view('admin.users.user_detalle',compact('usuario','proyectos','checks','numProyectosUsuario','infoChecks','misProyectos'));
    }

     public function previous($id)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Visualizar usuarios') ){

            $usuario = User::find($id);
            return view('admin.users.vista_previa',compact('usuario'));

        }else{
            return redirect()->back()->with('error','No permitido');
        }
    }

    public function inscribirAProyecto(Request $request, $id)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Agregar usuarios') ){
            $usuario = User::find($id);
            $ya_inscrito = sizeof($usuario->projects()->where('project_id',$request['proyecto'])->get());
            if($ya_inscrito == 0){
                
                $usuario->projects()->attach($request['proyecto']);
            
            }else{
                 return redirect()->back()->with('ya_inscrito','error'); 
            }
            
            return redirect()->back()->with('success','ok'); 
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }
          
        
        //return redirect()->back()->with('error','ok');
    }

    

}
