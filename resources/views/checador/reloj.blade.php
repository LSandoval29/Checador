<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/reloj.css')}}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('app_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('app_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <title>Checador | DASC</title>
</head>
<body>

<div class="container mx-auto mt-5">
    <div class="card-shadow-mb-4">  
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> No existe un usuario con esa matrícula.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="container mt-5">
            <div class="card bg-light text-black mb-3 mt-5">
                <div class="fecha">
                    <p id="diaSemana" class="diaSemana"></p>
                </div>
                <div class="reloj">
                    <p id="hora" class="hora"></p>
                    <h3 class="help-block text-center my-4">La Paz Baja California Sur, México.</h3>
                </div>
                <form action="/check" method="POST">
                    @csrf
                    <div class="card bg-light text-center">
                        <div class="row mx-auto">
                            <div class="col-xs-6 ">
                                <input type="text" name="matricula" class="form-control" placeholder="Matrícula">
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" class="btn btn-success"> Checar <i class="far fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div> 
                </form>   
                <div class="help-block text-center my-4" style="font-weight: italic;">
                    *Ingrese su matrícula para checar entrada.
                </div>  
            </div>   
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('app_assets/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('app_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script src="{{asset('js/reloj.js')}}"></script>  
</body>
</html>