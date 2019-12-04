@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{asset('css/reloj.css')}}">

@section('content')


<div class="container-fluid">
    <div class="card-shadow-mb-4">
        
    <div class="lockscreen-logo">
    <a href="../../index2.html"><b>UABCS-</b><b>DASC</b></a>
    </div>

    <div class="container">
        
            <div class="fecha">
                <p id="diaSemana" class="diaSemana"></p>
            </div>
            <div class="reloj">
                <p id="hora" class="hora"></p>
            </div>
        
    </div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
        <div class="input-group">
            <input type="password" class="form-control" placeholder="Matrícula">

            <div class="input-group-append">
                <div class="form-group">
                    <button type="button" class="btn btn-success"> Checar <i class="far fa-check-circle"></i></button>
                </div>
            </div>
        </div>
    </form>
    <!-- /.lockscreen credentials -->

    </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{asset('js/reloj.js')}}"></script>
@endsection