<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;

class projectController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Visualizar usuarios')){

            $projects = Project::where('status', 'active')->get();
            $section_name = "Proyectos";

            return view('admin.projects.index',compact('projects','section_name'));

        }

        return redirect()->back()->with('error', 'No Permitido'); 
    }

    public function store(Request $request)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Agregar usuarios') ){
            if(Project::create($request->all())){
                return redirect()->back()->with('success','ok');
            }
            
            return redirect()->back()->with('error','ok');
        
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }
        
    }

    public function show($id)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Visualizar usuarios') ){
            $project = Project::find($id);
            return $project;
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }
        
    }

    public function update(Request $request)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Editar usuarios') ){
            if($project = Project::find($request['id'])){
                if($project->update($request->all())){
                    return redirect()->back()->with('success','ok');
                }
            }
            return redirect()->back()->with('error','ok');
        
        }else{
            return redirect()->back()->with('error','No permitido'); 
        }
        
    }

    public function destroy($id)
    {

        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Eliminar usuarios') ){
            $project = null;
            if($project = Project::find($id)){
                $project->status = "inactive";
                if($project->save()){
                    return response()->json([
                        'message' => "Proyecto eliminado corectamente",
                        'code' => 2,
                        'data' => null
                    ],200);
                }
            }
            return response()->json([
                    'message' => "No se ha podido eliminar",
                    'code' => 2,
                    'data' => null
                ], 200);
        
        }else{
            return response()->json([
                'message' => "No tienes los permisos",
                'code' => 5,
                'data' => null
            ], 404);
        }
    }
}
