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
    <title>CHECADOR | DASC</title>
</head>
<body>


<div class="container mx-auto mt-5">
    <div class="card-shadow-mb-4">  
        <div class="container">
            <div class="card bg-light text-black mb-3 mt-5">

                <div class="fecha">
                    <p id="diaSemana" class="diaSemana"></p>
                </div>
                <div class="reloj">
                    <p id="hora" class="hora"></p>
                </div>
                <form method="POST" action="">
                    <div class="input-group mb-5">
                        <input type="password" class="form-control" placeholder="Matrícula">
                        <div class="input-append-group">
                        <button type="submit" class="btn btn-success"> Checar <i class="far fa-check-circle"></i></button>
                        </div>
                    </div> 
                </form>        
            </div>
    </div>
</div>



<script src="{{asset('js/reloj.js')}}"></script>  
</body>
</html>