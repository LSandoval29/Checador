<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
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

    public function detail($id)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Visualizar usuarios') ){

            $usuario = User::find($id);
            return view('admin.users.user_detalle',compact('usuario'));

        }else{
            return redirect()->back()->with('error','No permitido');
        }
    }
    

}
