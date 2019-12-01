@extends('layouts.app')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary border-bottom-primary">
        <div class="card-header">
          <h3 class="card-title">Proyecto</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Nombre del Proyecto</label>
            <div class="text-muted">
            	<label>{{$project->nombre}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputDescription">Descripcion</label>
            <div class="text-muted">
            	<label>{{$project->descripcion}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus">Feha de Inicio</label>
            <div class="text-muted">
            	<label>{{$project->fechaInicio}}</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputClientCompany">Fecha de Cierre</label>
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

      <div class="card card-info border-bottom-primary">
        <div class="card-header">
          <h3 class="card-title">Miembros del Proyecto</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Ver</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Loir </td>
                <td class="py-0 align-middle">
                  <div class="btn-group btn-group-sm">
                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  </div>
                </td>
               </tr>

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