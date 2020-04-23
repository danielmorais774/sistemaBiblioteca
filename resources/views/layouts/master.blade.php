
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="/css/app.css">

</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Sistema Biblioteca</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://image.flaticon.com/icons/svg/145/145843.svg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('autores.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Autores
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{ route('editoras.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        Editoras
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('exemplares.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-sticky-note"></i>
                    <p>
                        Exemplares
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('livros.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Livros
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('emprestimos.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Emprestimos
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Reservas
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('reservar.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-right"></i>
                            <p>Resevar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reservasaluno.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-arrow-right"></i>
                            <p>Reservas por aluno</p>
                        </a>
                    </li>
                </ul>
            <li class="nav-item">
                <a href="{{ route('devolucoes.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Devolução
                    </p>
                </a>
            </li>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div id="app" style="display: none">
        @include('includes.alerts')
        @yield('content')

    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="">Sistema Biblioteca</a>.</strong> todos os direitos reservado.
  </footer>
</div>
<!-- ./wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
<script src="/js/app.js"></script>

</body>
</html>
