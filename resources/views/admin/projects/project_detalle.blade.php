@extends('layouts.app')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary border-bottom-primary border-left-primary">
        <div class="card-header">
          <h3 class="card-title">Proyecto - Detalles</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName" class="text-primary">Nombre del Proyecto:</label>
            <div class="text-muted">
            	<label>{{$project->nombre}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputDescription" class="text-primary">Descripción:</label>
            <div class="text-muted">
            	<label>{{$project->descripcion}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="text-primary">Feha de Inicio:</label>
            <div class="text-muted">
            	<label>{{$project->fechaInicio}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputClientCompany" class="text-primary">Fecha de Cierre:</label>
            <div class="text-muted">
            	<label>{{$project->fechaCierre}}</label>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">

      <div class="card card-info border-bottom-primary border-left-primary">
        <div class="card-header">
          <h3 class="card-title">Miembros del Proyecto</h3>
        </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th class="text-primary">Nombre:</th>
                @if(Auth::user()->role == 1)
                <th class="text-primary">Ver</th>
                @endif
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <td>* {{$user->name}} {{$user->lastname}}</td>
                @if(Auth::user()->role == 1)
                  <td class="py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                      <a href="/usuario_detalle/{{$user->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    </div>
                  </td>
                @endif
               </tr>
            @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
<!-- /.content -->

@endsection 