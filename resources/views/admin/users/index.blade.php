@extends('layouts.app')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('app_assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet"
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      @if( Auth::user()->hasPermissionTo('Editar usuarios'))
        <button class="btn btn-primary btn-icon-split m-0 float-right " data-toggle="modal" data-target="#mymodal" title="Add new user">
            <span class="icon text-white-50">
              <i class="fas fa-user"></i>
            </span>
            <span class="text">Agregar nuevo usuario</span>
        </button>
       @endif 
        <h5 class="m-0 font-weight-bold text-primary">{{$section_name}}</h5>
      </div>
      <div class="col-md-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nombre(s)</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombre(s)</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th> 
                      </tr>
                    </tfoot>
                    <tbody>
                      @if(isset($users) && count($users)>0)
                      @foreach($users as $user)
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->lastname}}</td>
                          <td>{{$user->date_of_birth}}</td>
                          <td>{{$user->phone_number}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at}}</td>
                          <td>
                          @if( Auth::user()->hasPermissionTo('Editar usuarios'))
                            <button onclick="deleteThis({{$user->id}},this)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top">
                              <i class="fas fa-trash"></i>
                              Eliminar
                            </button>
                          @endif

                          @if( Auth::user()->hasPermissionTo('Editar usuarios'))
                            <button onclick="getDataBack({{$user->id}})" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top">
                              <i class="fas fa-pencil-alt"></i>
                              Actualizar
                            </button>
                          @endif

                            <a class="btn btn-primary btn-sm" href="/usuario_detalle/{{$user->id}}">
                            <i class="fas fa-user"></i>
                              Ver perfil
                            </a>
                          </td>
                        </tr>
                      @endforeach
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
</div>
@endsection

@section('modals')
<!--Modal de Agregar-->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('user') }}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="exampleInputPassword1">Nombre(s)</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">N</span>
                      </div>
                      <input type="text" name="name" id="name" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Apellidos</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">L</span>
                      </div>
                      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha de nacimiento</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">D</span>
                      </div>
                      <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Teléfono</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">P</span>
                      </div>
                      <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">E</span>
                      </div>
                      <input type="email" name="email" id="email" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">P</span>
                      </div>
                      <input type="password" name="password" id="password" class="form-control" placeholder="********" required> 
                  </div>
                  <small id="emailHelp" class="form-text text-muted">8 character min.</small>
				      </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                  Cancelar
                </button>
                <button class="btn btn-primary" type="submit">
	          	    Agregar
	              </button>
              </div>            
          </div>
        </form>
      </div>
    </div>
</div>
<!--Modal de editar-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('user') }}" method="POST">
          @csrf
          <input name="_method" type="hidden" value="PUT">
        	<input type="hidden" value="" id="id" name="id">
          <div class="modal-body">
              <div class="form-group">
                  <label for="exampleInputPassword1">Nombre(s)</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">N</span>
                      </div>
                      <input type="text" id="name_edit" name="name" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Apellidos</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">L</span>
                      </div>
                      <input type="text" id="lastname_edit" name="lastname" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha de nacimiento</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">D</span>
                      </div>
                      <input type="date" id="date_of_birth_edit" name="date_of_birth" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Teléfono</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">P</span>
                      </div>
                      <input type="text" id="phone_number_edit" name="phone_number" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">E</span>
                      </div>
                      <input type="email" id="email_edit" name="email" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">P</span>
                      </div>
                      <input type="password" name="password" class="form-control" id="password_edit"  placeholder="********" required> 
                  </div>
                  <small id="emailHelp" class="form-text text-muted">8 character min.</small>
				      </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                  Cancelar
                </button>
                <button class="btn btn-primary" type="submit">
	          	    Actualizar
	              </button>
              </div>            
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('app_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('app_assets/js/demo/datatables-demo.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('app_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	function getDataBack(id){
		console.log(id)

		axios.get('{{ route("user") }}/'+id)
		  .then(function (response) {
		    	console.log(response.data)
		    if (response.data) {
		    	$('#modalEdit').modal('toggle');

		    	$("#name_edit").val(response.data.name)
		    	$("#lastname_edit").val(response.data.lastname)
		    	$("#date_of_birth_edit").val(response.data.date_of_birth)
		    	$("#phone_number_edit").val(response.data.phone_number)
		    	$("#email_edit").val(response.data.email) 

		    	$("#id").val(id) 

		    }else{
		    	$('#modalEdit').modal('toggle');
		    	alert("error")
		    }
		  });
  }
  
  function deleteThis(id,button){
    console.log(id);
    swal({
      title: "Are you sure?",
      text: "Your will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      axios.delete('{{ URL::to("userdestroy") }}/'+id)
		  .then(function (response) {
          console.log(response.data)
          if (response.data.code == 2) {
			     		swal("Deleted!", "El registro se ha eliminado.", "success");
              var row = $(button).parent().parent();
			     		$(row).remove();
          }else{
            swal("Error!", "El registro no pudo ser eliminado.", "error");
          } 
		  });
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
  }

</script>
@endsection
