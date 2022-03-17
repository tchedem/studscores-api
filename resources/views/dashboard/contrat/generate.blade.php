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
                  <li class="breadcrumb-item">Contrats</li>
                  <li class="breadcrumb-item active"><a href="#">Générer</a></li>
                  <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">

                  <h2 class="text-center">{{ $contrat->name }}</h2>
                  {{-- <h2 class="text-center">{{ app('request')->input('contrat_name') }}</h2> --}}



                    <form action="{{ route('contrats.store') }}" method="post">

                      <div class="form-group">
                        <label for="">Type Contrat</label>
                        <input class="form-control" type="text" value=" {{ $typeContrat->name }} " disabled="disabled">
                        {{-- <label for="summernote">Nom Type Contrat</label>
                        <input class="form-control" type="text" name="" id="" placeholder="CONTRAT DE BAIL D’HABITATION"> --}}
                      </div>

                      <!-- <label for="summernote"><h2>Partie I: <small>Définition des conditions d'existences</small></h2></label> -->
                      <label for="summernote"><h2>Partie I:</h2></label>

                      <div class="card card-success">

                        <div class="card-header">

                          <h2 class="card-title">Définition des conditions d'existence</h2>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>

                        </div>

                        <div class="card-body">
                          <div class="btn-group float-right">
                            {{-- {# <button type="button" class="btn btn-info">Statut</button> #} --}}
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="#">Invalider</a>
                              <a class="dropdown-item" href="#">Valider</a>
                              {{-- {# <div class="dropdown-divider"></div> --}}
                              {{-- <a class="dropdown-item" href="#">Separated link</a> #} --}}
                            </div>
                          </div>
                          <textarea id="summernote" placeholder="">
                            {{ $contratPartie1[0]->contenu }}
                          </textarea>

                        </div>

                        {{-- {# <button>Ajouter paragraphe</button> #} --}}

                      </div>


                      <label for="summernote"><h2>Partie II:</h2></label>
                      <div class="card card-success collapsed-card">
                        <div class="card-header">

                          <h2 class="card-title">Les obligations ou définition des articles</h2>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>

                        </div>

                        <div class="card-body">

                          <div class="form-group">
                            <label for="">Article 1</label>
                            <div class="btn-group float-right">
                              {{-- {# <button type="button" class="btn btn-info">Statut</button> #} --}}
                              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#">Invalider</a>
                                <a class="dropdown-item" href="#">Valider</a>
                                {{-- {# <div class="dropdown-divider"></div> --}}
                                {{-- <a class="dropdown-item" href="#">Separated link</a> #} --}}
                              </div>
                            </div>
                            <textarea id="summernote2" placeholder="">
                              Saisisez <em>votre</em> <u>texte</u>
                            </textarea>
                          </div>

                          <div class="form-group">

                            <label for="summernote">Article 2</label>

                            <div class="btn-group float-right">
                              {{-- {# <button type="button" class="btn btn-info">Statut</button> #} --}}
                              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#">Invalider</a>
                                <a class="dropdown-item" href="#">Valider</a>
                                {{-- {# <div class="dropdown-divider"></div> --}}
                                {{-- <a class="dropdown-item" href="#">Separated link</a> #} --}}
                              </div>
                            </div>

                            <textarea id="summernote3" placeholder="">
                              Saisisez <em>votre</em> <u>texte</u>
                            </textarea>

                          </div>

                          <div class="form-group">

                            <label for="summernote">Article 3</label>

                            <div class="btn-group float-right">
                              {{-- {# <button type="button" class="btn btn-info">Statut</button> #} --}}
                              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#">Invalider</a>
                                <a class="dropdown-item" href="#">Valider</a>
                                {{-- {# <div class="dropdown-divider"></div> --}}
                                {{-- <a class="dropdown-item" href="#">Separated link</a> #} --}}
                              </div>
                            </div>

                            <textarea id="summernote4" placeholder="">
                              Saisisez <em>votre</em> <u>texte</u>
                            </textarea>

                          </div>

                          <a href="#" class="btn btn-primary float-right">Ajouter un article</a>

                        </div>

                      </div>


                      <label for="summernote"><h2>Partie III:</h2></label>
                      <div class="card card-success collapsed-card">
                        <div class="card-header">

                          <h2 class="card-title">Mot de fin et définition des parties prenantes</h2>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>

                        </div>

                        <div class="card-body">

                          <div class="btn-group float-right">
                            {{-- {# <button type="button" class="btn btn-info">Statut</button> #} --}}
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="#">Invalider</a>
                              <a class="dropdown-item" href="#">Valider</a>
                              {{-- {# <div class="dropdown-divider"></div> --}}
                              {{-- <a class="dropdown-item" href="#">Separated link</a> #} --}}
                            </div>
                          </div>

                          <textarea id="summernote-end">
                            {{ $contratPartie3[0]->contenu }}
                          </textarea>


                        </div>

                      </div>

                      <button type="submit" class="btn btn-primary float-right">Enrégistrer</button>
                      <!-- <a href="#" class="btn btn-primary float-right">Enrégistrer</a> -->

                    </form>

                  </div>
                </div>

                <!-- <div class="card card-primary card-outline">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>

                    <p class="card-text">
                      Some quick example text to build on the card title and make up the bulk of the card's
                      content.
                    </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div> -->
              </div>

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
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Page specific script -->
    <script>

      /*$(function () {
          // Summernote
          $('#summernote').summernote('disable');
      })*/

      $(function () {
          // Summernote
          $('#summernote').summernote();
          $('#summernote-end').summernote();
          //$('#summernote-end').summernote();

          $('#summernote2').summernote();
          $('#summernote3').summernote();
          $('#summernote4').summernote();

      })

    </script>
</body>

@endsection
