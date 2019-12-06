<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/home')}}">
  
  <div class="sidebar-brand-text mx-3">Checador <b>DASC</b></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="{{URL::to('/home')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

@if( Auth::user()->hasPermissionTo('Editar usuarios'))
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
  <a class="nav-link" href="{{URL::to('/users')}}">
    <i class="fas fa-user fa-table"></i>
    <span>Usuarios</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{URL::to('/projects')}}">
    <i class="nav-icon fas fa-project-diagram"></i>
    <span>Proyectos</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-cogs "></i>   
    <span>Configuración</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
@endif




<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
