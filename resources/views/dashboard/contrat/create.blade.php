@extends('layouts_perso.dashboard')

@section('title')
<title>Contrat - Générer Contrat</title>
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
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Dashboard</li>
                  <li class="breadcrumb-item">Contrats</li>
                  {{-- <li class="breadcrumb-item active"><a href=" {{ route('add_contrat') }} ">Ajouter</a></li> --}}
                  <li class="breadcrumb-item active"><a href="#">Ajouter</a></li>
                  <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
                </ol>
              </div><!-- /.col -->
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

                <div class="clearfix">
                  <button type="button" class="btn btn-outline-primary float-right" title="Ajouter informations complémentaires du contrat: Liste des signataires">Ajouter Informations</button>

                </div>

                <form action="{{ route('contrats.store') }}" method="post">

                    @csrf

                    <div class="form-group">
                        <label>Type contrat</label>
                        <select class="form-control select2bs4" name="type_contrat_id" style="width: 100%;">
                            <option selected="selected"> ------- Choisissez un type de contrat ------- </option>
                            @foreach($typeContrats as $typeContrat)
                            <option value="{{$typeContrat->id}}" > {{ $typeContrat->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Nom du contrat</label>
                        <input class="form-control" type="text" name="contrat_name" id="">
                    </div>

                    <button class="btn btn-primary float-right" type="submit">Générer</button>

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
