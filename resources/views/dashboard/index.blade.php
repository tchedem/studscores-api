@extends('layouts_perso.dashboard')

@section('title')
<title>StudScore API Manager | Logs</title>
@endsection

@section('body')
<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

      <!-- Navbar -->
      @include("dashboard.partials.top-menu")

      <!-- Main Sidebar Container -->
      @include("dashboard.partials.sidebar-menu")

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
                  <li class="breadcrumb-item active">Dashboard</li>
                  <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li>
                  <li class="breadcrumb-item active">Top Navigation</li> -->
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
                      <h3 class="col text-center">Logs</h3>
                    </div>

                    <div class="card-body">

                      {{-- <p class="text-center" style="border:1px solid black;">
                        Aucun fichier
                      </p> --}}

                      <table id="example1" class="table table-bordered table-responsive">
                          <thead>
                              <tr>
                                  <th>id</th>
                                  <th>subject</th>
                                  {{-- <th>query_request</th> --}}
                                  <th>query_type</th>
                                  {{-- <th>transaction_id</th> --}}
                                  <th>url</th>
                                  <th>method</th>
                                  <th>ip</th>
                                  <th>agent</th>
                                  <th>user_id</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($logs as $log)
                              <tr>
                                  <td>{{$log->id}}</td>
                                  <td>{{$log->subject}}</td>
                                  {{-- <td>{{$log->query_request}}</td> --}}
                                  <td>{{$log->query_type}}</td>
                                  {{-- <td>{{$log->transaction_id}}</td> --}}
                                  <td>{{$log->url}}</td>
                                  <td>{{$log->method}}</td>
                                  <td>{{$log->ip}}</td>
                                  <td>{{$log->agent}}</td>
                                  <td>{{$log->user_id}}</td>
                              </tr>
                              @endforeach

                          </tbody>
                          <tfoot>
                              <tr>
                                <th>id</th>
                                <th>subject</th>
                                {{-- <th>query_request</th> --}}
                                <th>query_type</th>
                                {{-- <th>transaction_id</th> --}}
                                <th>url</th>
                                <th>method</th>
                                <th>ip</th>
                                <th>agent</th>
                                <th>user_id</th>
                              </tr>
                          </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
        <strong>Student Score API &copy; 2022 <a href="https://uac.bj/">UAC BJ</a>.</strong> All rights reserved.
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
    
</body>
@endsection
