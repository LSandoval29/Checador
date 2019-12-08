<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Checador | DASC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('app_assets/vendor/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Custom styles for this template-->
  <link href="{{ asset('app_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <div class="content-wrapper" style="margin-left: 0px">

    <section class="content">
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-12">

            @if(!empty($checkEntrada))
              <div class="alert alert-success" role="alert">
                    <h4 class="segundos float-left" style="font-size: 50px; margin-top: -1%; font-weight: italic;"></h4>
                    <h4 class="alert-heading float-right">Entrada Registrada <i class="far fa-check-circle"></i></h4>
                    <p class="text-center">Se cerrará la página al terminar los segundos mostrados.</p>
              </div>
            @endif

            @if($check->status == "concluida")
              <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Salida Registrada!</h4>
                    <p>Se cerrará la página al terminar los segundos mostrados.</p>

                    <h4 class="segundos float-right" style="font-size: 50px; margin-top: -3%; font-weight: bold;"></h4>
              </div>
            @endif

            @if($check->status == "noAceptado")
              <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"> No Se Realizo El Registro!</h4>
                    <p>Los registros no se realizaron el mismo dia.</p>

                    <h4 class="segundos float-right" style="font-size: 50px; margin-top: -3%; font-weight: bold;"></h4>
              </div>
            @endif

            <!-- Main content -->
            <div class="invoice p-3 mb-3" style="background: #dfefef;">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <div class="container-fluid">
                      <div class="row">
                        <!-- Tabla checks -->
                        <div class="col-md-9">
                          <div class="card border-dark ">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body text-dark">
                              <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                  <!-- Post -->
                                  <div class="card-body">
                                    @if(!empty($checkEntrada))
                                      <div class="form-group">
                                        <label for="inputName">Información del check:</label>
                                        <div class="text-muted ">
                                          <label class="ml-4"><a href="#">Hora de entrada:</a> {{$check->horaEntrada}}</label>
                                        </div>
                                      </div>
                                    @endif
                                    @if($check->status == "concluida")
                                      <div class="form-group ">
                                        <label for="inputName">Información del check:</label>
                                        <div class="text-muted">
                                          <label class="ml-4"><a href="#">Hora de entrada:</a> {{$check->horaEntrada}}</label><br>
                                          <label class="ml-4"><a href="#">Hora de salida:</a> {{$check->horaSalida}}</label><br>
                                          <label class="ml-4"><a href="#">Duración:</a> {{$check->duracion}}</label>
                                        </div>
                                      </div>
                                    @endif
                                    <div class="form-group">
                                      <label for="inputName">Checks</label>
                                      <div class="text-muted">
                                        <label class="ml-4"><a href="#">Total checks:</a> {{$checks}}</label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputDescription">Proyectos</label>
                                      <div class="text-muted">
                                        <label class="ml-4"><a href="#">Total proyectos:</a>{{$numProyectosUsuario}}</label>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.post -->
                                </div>
                              </div>
                              <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                          </div>
                          <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- Termina Tabla de Checks-->


                        <div class="col-md-3">

                          <!-- Profile Image -->
                          <div class="card border-dark card-primary card-outline">
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('app_assets/img/user.png') }}"
                                     alt="User profile picture">
                              </div>

                              <h3 class="profile-username text-center">{{$usuario->name}}</h3>

                              <p class="text-muted text-center">{{$usuario->lastname}}</p>

                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b>F. Nacimiento</b> <a class="float-right">{{$usuario->date_of_birth}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Telefono</b> <a class="float-right">{{$usuario->phone_number}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Email</b> <a class="float-right">{{$usuario->email}}</a>
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
                    </div>
                    

                  </h4>
                </div>
                <!-- /.col -->
              </div>
            </div>
        
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
  </div>
  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

</div>


<!-- jQuery -->
<script src="{{asset('app_assets/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('app_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/checarTiempo.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>