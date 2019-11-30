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
        <button class="btn btn-info btn-icon-split m-0 float-right " data-toggle="modal" data-target="#mymodal" title="Add new user">
            <span class="icon text-white-50">
              <i class="fas fa-user"></i>
            </span>
            <span class="text">Añadir nuevo proyecto</span>
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
                        <th>Nombre proyecto</th>
                        <th>Descripción</th>
                        <th>Fecha inicio</th>
                        <th>Fecha cierre</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombre proyecto</th>
                        <th>Descripción</th>
                        <th>Fecha inicio</th>
                        <th>Fecha cierre</th>
                        <th>Actions</th> 
                      </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($projects) && count($projects)>0)
                      @foreach($projects as $project)
                        <tr>
                          <td>{{$project->nombre}}</td>
                          <td>{{$project->descripcion}}</td>
                          <td>{{$project->fechaInicio}}</td>
                          <td>{{$project->fechaCierre}}</td>
                          <td>
                          @if( Auth::user()->hasPermissionTo('Editar usuarios'))
                            <button onclick="deleteThis({{$project->id}},this)" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete row">
                              <i class="fas fa-trash"></i>
                            </button>

                            <button onclick="getDataBack({{$project->id}})" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Edit row">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          </td>
                        </tr>
                        @endif
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
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo proyecto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('proyecto') }}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="exampleInputPassword1">Nombre proyecto</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">N</span>
                      </div>
                      <input type="text" name="nombre" id="nombreProyecto" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Descripción</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">D</span>
                      </div>
                      <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha inicio</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">FI</span>
                      </div>
                      <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha cierre</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">FC</span>
                      </div>
                      <input type="date" name="fechaCierre" id="fechaCierre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                  Cancel
                </button>
                <button class="btn btn-primary" type="submit">
	          	    Save
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
          <h5 class="modal-title" id="exampleModalLabel">Editar proyecto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('proyecto') }}" method="POST">
          @csrf
          <input name="_method" type="hidden" value="PUT">
        	<input type="hidden" value="" id="id" name="id">
          <div class="modal-body">
              <div class="form-group">
                  <label for="exampleInputPassword1">Nombre proyecto</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">N</span>
                      </div>
                      <input type="text" id="nombreProyecto_edit" name="nombre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Descripción</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">D</span>
                      </div>
                      <input type="text" id="descripcion_edit" name="descripcion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha Inicio</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">FI</span>
                      </div>
                      <input type="date" id="fechaInicio_edit" name="fechaInicio" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Fecha cierre</label>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">FC</span>
                      </div>
                      <input type="date" id="fechaCierre_edit" name="fechaCierre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                  Cancel
                </button>
                <button class="btn btn-primary" type="submit">
	          	    Save
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

		axios.get('{{ route("proyecto") }}/'+id)
		  .then(function (response) {
		    	//console.log(response.data)
		    if (response.data) {
		    	$('#modalEdit').modal('toggle');

		    	$("#nombreProyecto_edit").val(response.data.nombre)
		    	$("#descripcion_edit").val(response.data.descripcion)
		    	$("#fechaInicio_edit").val(response.data.fechaInicio)
		    	$("#fechaCierre_edit").val(response.data.fechaCierre)

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
      axios.delete('{{ URL::to("proyecto") }}/'+id)
		  .then(function (response) {
          console.log(response.data)
          if (response.data.code == 2) {
			swal("Deleted!", "El proyecto se ha eliminado.", "success");
            var row = $(button).parent().parent();
			$(row).remove();
          }else{
            swal("Error!", "El proyecto no pudo ser eliminado.", "error");
          } 
		  });
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
  }

</script>
@endsection