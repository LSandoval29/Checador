@extends('layouts.app')



@section('content')

<!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
        <h5 class=" font-weight-bold text-primary">Actividades de Hoy</h5>
        <div class="col-md-12 mb-3">
              <div class="card card-primary card-outline">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead class="thead-light">
                        <tr>
                          <th>Log</th>
                          <th>Hora</th>
                          <th>Duración</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          <tr>
                            <td>Entrada</td>
                            <td>9:30 am</td>
                            <td>1 hr</td>
                          </tr>
                          <tr>
                            <td>Salida</td>
                            <td>12:00 pm</td>
                            <td>NA</td>
                          </tr>
                      
                      </tbody>
                  </table>
                </div>
              </div>
        </div>
      
    <!--Información Personal -->
      <div class="col-md-12 mb-5">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile border-bottom-primary">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('app_assets/img/user.png') }}"
                   alt="User profile picture">
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!--Endi divider-->

            <h3 class="profile-username text-center">{{Auth::User()->name}} {{Auth::User()->lastname}}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b class="text-primary">Fecha de Nacimiento:</b> {{Auth::User()->date_of_birth}} <a class="float-right"></a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Teléfono:</b> {{Auth::User()->phone_number}} <a class="float-right"></a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Email:</b> {{Auth::User()->email}} <a class="float-right"></a>
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

@section('scripts')

@endsection