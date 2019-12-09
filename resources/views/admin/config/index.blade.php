@extends('layouts.app')

@section('content')


<div class="col-md-12 mx-auto">
    <div class="card card-dark border-bottom-primary">
      <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary">Actualizar segundos de pantalla de espera</h5>
      </div>
      <form role="form" action="/config_segundos" method="POST">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Ingrese los segundos:" name="segundos" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection