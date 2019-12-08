@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
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
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
              @if(Auth::user()->role == 1 )
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Inscribir a Proyecto</a></li>
              @endif
              @if(Auth::user()->role == 2 )
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Mis Proyectos</a></li>
              @endif
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body border-bottom-primary">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="card-body">
		          <div class="form-group">
		            <label class="text-primary"># de Checks:</label>
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
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      3 Jan. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              @if(Auth::user()->role == 1 )
              <div class="tab-pane" id="settings">
              <form class="form-horizontal" method="POST" action="/inscribirAProyecto/{{$usuario->id}}">
                @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Proyecto</label>
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
                      <button type="submit" class="btn btn-success">Inscribir!</button>
                    </div>
                  </div>
              </form>
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
              </div>
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