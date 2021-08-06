<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin @yield('title')</title>

  @include('backend.layouts.partial.style')

  @yield('css')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
    @include('backend.layouts.partial.header')

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('backend.layouts.partial.left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('backend-content')
  </div>
  <!-- /.content-wrapper -->
  
  {{-- @include('backend.layouts.partial.footer') --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.layouts.partial.script')
    
    @yield('js')
    @include('sweetalert::alert')

</body>
</html>
