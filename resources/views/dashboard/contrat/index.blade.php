@extends('layouts_perso.dashboard')

@section('title')
<title>Contrat - Liste des contrats</title>
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
                  <li class="breadcrumb-item active"><a href=" {{ route('contrats.index') }} ">Contrats</a></li>
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
                    <h3 class="col text-center">Liste des contrats</h3>
                  </div>

                  <div class="card-body">
                    <div class="clearfix mb-2">
                        <a href=" {{ route('contrats.create') }} "><button class="btn btn-primary float-right">Ajouter un Contrat</button></a>
                    </div>

                    {{-- <p class="text-center" style="border:1px solid black;">
                      Aucun fichier
                    </p> --}}

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom contrat</th>
                                <th class="align-center" style="width: 30%;">Statut</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contrats as $contrat)
                            <tr>
                                <td>{{$contrat->name}}</td>
                                <td class="text-center">
                                    {{-- <input type="checkbox" disabled="disabled"> --}}
                                    @if ($contrat->status == 'en_cours')
                                        En cours
                                    @else
                                        Terminer
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('contrats.show', $contrat->id) }}" class="btn btn-success" title="Afficher"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-info"><i class="fa fa-edit" title="Modifier"></i></a>
                                        {{-- <a href="#" class="btn btn-info" title="Afficher"><i class="fas fa-print"></i></a> --}}
                                        {{-- <a href="{{route('PdfController.edit', $contrat->id)}}" class="btn btn-info m-2"><i class="fas fa-print"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            {{-- <tr>
                                <td>Nom_Contrat_1</td>
                                <td class="text-center">
                                <span class="badge bg-secondary" title="Créer">&nbsp;</span>
                                <span class="badge bg-warning disabled" title="En cours de modification">&nbsp;</span>
                                <span class="badge bg-primary disabled" title="Terminer">&nbsp;</span>
                                <span class="badge bg-success disabled" title="Valider">&nbsp;</span>
                                <span class="badge bg-danger disabled" title="Invalider">&nbsp;</span>
                                </td>
                                <td>
                                <div class="btn-group">
                                    <!-- <a href="#"
                                        class="btn btn-success m-2">
                                        <i class="fa fa-eye"></i>
                                    </a> -->
                                    <a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nom_Contrat_2</td>
                                <td class="text-center">
                                <button type="button" class="btn btn-secondary" title="Créer"></button>
                                <button type="button" class="btn btn-warning disabled" title="En cours de modification"></button>
                                <button type="button" class="btn btn-primary disabled" title="Terminer"></button>
                                <button type="button" class="btn btn-success disabled" title="Valider"></button>
                                <button type="button" class="btn btn-danger disabled" title="Invalider"></button>
                                </td>
                                <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nom_Contrat_3</td>
                                <td class="text-center">
                                -
                                </td>
                                <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fas fa-print"></i></a>
                                </div>
                                </td>
                            </tr> --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nom contrat</th>
                                <th class="align-center" style="width: 10%;;">Statut</th>
                                <th style="width: 10%;">Actions</th>
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
            "autoWidth": false,
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
