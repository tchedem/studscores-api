@extends('layouts_perso.dashboard')

@section('title')
<title>Contrat - Type Contrats</title>
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
      <div class="content-wrapper">
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
                  {{-- <li class="breadcrumb-item active"><a href=" {{ path('type_contrats') }} ">Type Contrats</a></li> --}}
                  <li class="breadcrumb-item active"><a href="#">Type Contrats</a></li>
                  <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container">

            <div class="row">
              <div class="col-lg-12">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="col text-center">Liste des types de contrats</h3>
                  </div>

                  <div class="card-body">
                    {{-- {# <p class="text-center" style="border:1px solid black;">
                      Aucun fichier
                    </p> #} --}}

                    <div class="clearfix mb-2">
                      <a href=" {{ route('type_contrats.create') }} "><button class="btn btn-primary float-right">Ajouter un Type de Contrat</button></a>
                      {{-- <a href=" {{ path('add_type_contrat') }} "><button class="btn btn-primary float-right">Ajouter un Type de Contrat</button></a> --}}
                    </div>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom Type Contrat</th>
                                <th class="align-center" style="width: 10%;">Statut</th>
                                <th style="width: 30%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($typeContrats as $typeContrat)
                            <tr>
                                <td>{{$typeContrat->name}}</td>
                                <td class="text-center">
                                    <input type="checkbox" disabled="disabled">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('type_contrats.show', $typeContrat->id) }}" class="btn btn-success" title="Afficher"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('type_contrats.edit', $typeContrat->id) }}" class="btn btn-info"><i class="fa fa-edit" title="Modifier"></i></a>
                                        {{-- <a href="#" class="btn btn-info" title="Afficher"><i class="fas fa-print"></i></a> --}}
                                        {{-- <a href="{{route('PdfController.edit', $typeContrat->id)}}" class="btn btn-info m-2"><i class="fas fa-print"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nom contrat</th>
                                <th class="align-center">Statut</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "buttons":
            [
                "copy",
                "csv",
                "excel",
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                "print",
                "colvis"
            ],
            language: {
                buttons: {
                    copy: 'Copier',
                    csv: 'CSV',
                    excel: 'Excel',
                    pdfHtml5: 'PDF',
                    print: 'Imprimer',
                    colvis: 'Colonne Visible',
                },
                "search": "Rechercher:",
                "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "previous": "Précédent",
                        "next": "Suivant"
                    }
                },
                exportOptions:{
                    columns: [0,1,2,3]
                },
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      });
    </script>
</body>

@endsection
