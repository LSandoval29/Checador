@extends('layouts.app')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('app_assets/img/user.png')}}"
                   alt="User profile picture">
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <h3 class="profile-username text-center">{{$usuario->name}} {{$usuario->lastname}}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b class="text-primary">Cumpleaños:</b> <a class="float-right">{{$usuario->date_of_birth}}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Celular:</b> <a class="float-right">{{$usuario->phone_number}}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Email:</b> <a class="float-right">{{$usuario->email}}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Matrícula:</b> <a class="float-right">{{$usuario->matricula}}</a>
              </li>
            </ul>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      
      <div class="col-md-6 mt-4">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
              @if(Auth::user()->role == 1 )
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Inscribir a Proyecto</a></li>
              @endif
              @if(Auth::user()->role == 2 )
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Mis Proyectos</a></li>
              @endif
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="card-body">
		          <div class="form-group">
		            <label class="text-primary">Número de checks:</label>
		            <div class="text-muted">
		            	<label>{{$checks}}</label>
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="text-primary">Proyectos en los que está inscrito:</label>
		            <div class="text-muted">
		            	<label>{{$numProyectosUsuario}}</label>
		            </div>
		          </div>
		        </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="far fa-clock bg-primary"></i>
                    @foreach($infoChecks as $infoCheck)
                    <div class="timeline-item mb-4">
                      <span class="time"><i class="fas fa-calendar-alt"></i> {{$infoCheck->fecha}}</span>
                      <h3 class="timeline-header">Actividad Completada</h3>

                      <div class="timeline-body">
                        <span class="time"><i class="far fa-clock"></i> Hora de Entrada  {{$infoCheck->horaEntrada}}</span><br>
                        <span class="time"><i class="far fa-clock"></i> Hora de Salida  {{$infoCheck->horaSalida}}</span><br>
                        <span class="time"><i class="fas fa-hourglass-end"></i> Duracion  {{$infoCheck->duracion}}</span>
                      </div>
                      <div class="timeline-footer">
                        
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- END timeline item -->
                </div>
              </div>
              <!-- /.tab-pane -->
              @if(Auth::user()->role == 1 )
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" action="/inscribirAProyecto/{{$usuario->id}}">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nombre del proyecto:</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="proyecto">
                          @foreach($proyectos as $proyecto)
                          <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                          @endforeach
                        </select>
                        

                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-lg">Inscribir</button>
                      </div>
                    </div>
                  </form>
                </div>
              @endif

              @if(Auth::user()->role == 2 )
                <div class="tab-pane" id="settings">
                  <div class="timeline timeline-inverse">
                      <div>
                        @foreach($misProyectos as $proyecto)
                          <i class="fas fa-project-diagram bg-info"></i>
                          <div class="timeline-item mb-2">
                            <span class="time"><i class="far fa-clock"></i> {{$proyecto->created_at}}</span>

                            <h3 class="timeline-header border-0"><a href="proyecto_detail/{{$proyecto->id}}">{{$proyecto->nombre}}</a>
                            </h3>
                          </div>
                        @endforeach
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                    </div>
                      
                    
                </div>
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection