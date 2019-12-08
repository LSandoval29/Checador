<!DOCTYPE html>
<html lang="es">

<head>
 @include('layouts.head')
 @yield('head')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('layouts.nav')

        <!-- Begin Page Content -->
        <div class="container-fluid mx-auto">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-12">
              
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                <strong>Muy bien!</strong> El proceso a terminado satisfactoriamente!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> El proceso no ha terminado, verifica tu información!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

            </div>
          </div> 
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('layouts.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @yield('modals')

  @include('layouts.scripts')

  @yield('scripts')

</body>

</html>

