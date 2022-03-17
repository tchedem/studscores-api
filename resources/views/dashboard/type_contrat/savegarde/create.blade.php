@extends('layouts_perso.dashboard')

@section('title')
<title>Contrat - Ajouter Type Contrat</title>
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
                  <li class="breadcrumb-item">Type Contrats</li>
                  <li class="breadcrumb-item active"><a href=" {{ route('contrats.create') }} ">Ajouter</a></li>
                  <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">

                {{-- <form action=" {{ route('add_type_contrat_store') }} " method="post"> --}}
                {{-- <form action=" {{ route('type_contrats.store') }} " method="post"> --}}
                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nom_type_contrat">Nom Type Contrat</label>
                        <input class="form-control" type="text" name="nom_type_contrat" id="nom_type_contrat" placeholder="CONTRAT DE BAIL D’HABITATION" onkeyup="reload_frame()">
                    </div>

                    <!-- <label for="summernote"><h2>Partie I: <small>Définition des conditions d'existences</small></h2></label> -->
                    <label for="summernote"><h2>Partie I:</h2></label>

                    <div class="card card-success">
                    {{-- {# collapsed-card #} --}}
                        <div class="card-header">
                            <h2 class="card-title custom_js_card_title_1" >Définition des conditions d'existence</h2>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Titre :</label>
                                <input type="text" class="form-control" name="card_title_value_1" value="Définition des conditions d'existence" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Contenu: </label>
                            <textarea id="summernote" name="contenu_partie_1" placeholder="" value="1">
                                Saisisez <em>votre</em> <u>texte</u>
                            </textarea>
                            </div>
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
                                <label for="">Titre :</label>
                                <input type="text" class="form-control" name="card_title_value_2" value="Les obligations ou définition des articles" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Article 1</label>
                                <textarea id="summernote2" placeholder="" name="article1">
                                Saisisez <em>votre</em> <u>texte</u>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Article 2</label>
                                <textarea id="summernote3" placeholder="" name="article2">
                                Saisisez <em>votre</em> <u>texte</u>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Article 3</label>
                                <textarea id="summernote4" placeholder="" name="article3">
                                Saisisez <em>votre</em> <u>texte</u>
                                </textarea>
                            </div>

                            <a href="#" class="btn btn-primary float-right">Ajouter un article</a>
                        </div>

                    </div>


                    <label for="summernote"><h2>Partie III:</h2></label>
                    <div class="card card-success collapsed-card">
                        <div class="card-header">

                        <h2 class="card-title ">Mot de fin et définition des parties prenantes</h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                        </div>

                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="">Titre :</label>
                                <input type="text" class="form-control" name="card_title_value_3" value="Mot de fin et définition des parties prenantes" readonly>
                            </div>

                            <textarea id="summernote-end" name="contenu_partie_3">
                                Place <em>some</em> <u>text</u>
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
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Prévisualisation</h5>
              </div>
              <div class="card-body">
                <!-- <h6 class="card-title">In this bow we wille see a live previous</h6>

                <p class="card-text">In this bow we wille see a live previous of contract final version.</p>

                <a href="#" class="btn btn-primary">Go somewhere</a> -->

              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src=" {{ asset('pdf_template.html') }} " height="800" width="800" sandbox="allow-same-origin allow-scripts allow-forms" scroll="no" style="overflow: hidden" id="iframe_id"></iframe>
              </div>


              </div>
            </div>

            <!-- <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div> -->
          </div>
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
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>


    <script>
    /*$(function () {
        // Summernote
        $('#summernote').summernote('disable');
    })*/

    $(function () {
        // Summernote
        $('#summernote').summernote();
        $('#summernote-end').summernote();

        $('#summernote2').summernote();
        $('#summernote3').summernote();
        $('#summernote4').summernote();
    })

        /*var custom_js_card_title_1 = document.querySelector('.custom_js_card_title_1'),
            card_title_value_1 = document.querySelector('.custom_js_card_title_1');
        */

        //iframe_id
        function reload_frame(){
            document.getElementById('iframe_id').contentWindow.location.reload(true);
        }

    </script>

</body>

@endsection
