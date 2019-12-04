@extends('layouts.app')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <h5 class="m-0 font-weight-bold text-primary">Actividades de Hoy</h5>

      <div class="col-md-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Log</th>
                        <th>Entrada</th>
                        <th>Duración</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Log</th>
                        <th>Entrada</th>
                        <th>Duración</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @if(isset($users) && count($users)>0)
                      @foreach($users as $user)
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->lastname}}</td>
                          <td>{{$user->date_of_birth}}</td>
                        </tr>
                      @endforeach
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
      </div>

       <!-- Grafica -->
        <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Resumen de Asistencia de la Semana</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Lunes <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Martes <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Miercoles <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Jueves <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Viernes <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

            </div>


            <!--Información Personal -->
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile border-bottom-primary">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="https://source.unsplash.com/QAB-WJcbgJk/60x60"
                   alt="User profile picture">
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!--Endi divider-->

            <h3 class="profile-username text-center">{{$usuario->name}} {{$usuario->lastname}}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b class="text-primary">Fecha de Nacimiento:</b> <a class="float-right">{{$usuario->date_of_birth}}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Teléfono:</b> <a class="float-right">{{$usuario->phone_number}}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Email:</b> <a class="float-right">{{$usuario->email}}</a>
              </li>
            </ul>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->


     



    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection 