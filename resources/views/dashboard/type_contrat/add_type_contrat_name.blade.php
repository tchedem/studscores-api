@extends('layouts_perso.dashboard')

@section('title')
<title>Contrat - Générer Type Contrat</title>
@endsection

@section('script')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('body')
<body class="hold-transition sidebar-collapse layout-top-nav">

    <div class="wrapper">

      <!-- Navbar -->
      @include("dashboard.partials.top-menu")

      <!-- Main Sidebar Container -->
      @include("dashboard/partials/sidebar-menu")

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <!-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> -->
              </div>
              <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Type Contrats</li>
                        <li class="breadcrumb-item active"><a href=" {{ route('contrats.create') }} ">Ajouter</a></li>
                    </ol>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center" style="height: 70vh;">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">

                <form action="{{ route('type_contrats.save.name') }}" method="post">

                    @csrf

                    <div class="form-group">
                        <label for="nom_type_contrat">Nom du Type de Contrat</label>
                        <input class="form-control" type="text" name="nom_type_contrat" id="nom_type_contrat" placeholder="CONTRAT DE BAIL D’HABITATION">
                    </div>

                    <a class="btn btn-outline-primary" href="{{route('type_contrats.index')}}"> &lt;&lt; Retour</a>
                    <button class="btn btn-primary float-right" type="submit">Créer</button>

                </form>
                <br>
              </div>
            </div>

          </div>


          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>SBIN SA &copy; 2022 <a href="https://sbin.bj/">SBIN BJ</a>.</strong> All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }} "></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>


    <script>

      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })

      /*$(function () {
          // Summernote
          $('#summernote').summernote('disable');
      })*/

      $(function () {
          // Summernote
          $('#summernote').summernote();
          $('#summernote-end').summernote();

      })
    </script>

</body>

@endsection
