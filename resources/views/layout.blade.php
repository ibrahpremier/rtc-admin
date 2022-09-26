<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rotaract Doyen | @yield("title")</title>
  @include("include.head_import")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    {{-- <img class="animation__shake" src="{{asset('assets/dist/img/rotaract-logo.png')}}" alt="logo" height="150"> --}}
  </div>

  <!-- Navbar -->
  @include("include.navbar")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include("include.sidebar")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> 
              @php
              $mandat = getMandat();
              echo $mandat->annee_debut.'-'.$mandat->annee_fin  
              @endphp
              | @yield("titre")</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            @yield("btn_action")
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield("content")
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include("include.footer")
</div>
<!-- ./wrapper -->
@include("include.script_import")
@yield("custom_script")
</body>
</html>
