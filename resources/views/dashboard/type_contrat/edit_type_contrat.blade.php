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
<body class="hold-transition sidebar-collapse layout-top-nav layout-footer-fixed">
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
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid" style="height: 70vh;">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">

                <div class="form-group">
                    <label>Nom Type Contrat</label>
                    <input class="form-control" type="text" value="{{$typeContrat->name}}" readonly>
                </div>
                <div class="form-group">

                    <button type="button" class="btn btn-default mr-1" data-toggle="modal" data-target="#modal-default-partie">Ajouter une Partie</button>

                </div>

                <div class="row">

                </div>
                <div class="form-group">
                    @foreach($partieTypeContrats as $partieTypeContrat)
                    <div class="card card-success collapsed-card">
                        <div class="card-header">
                            <h2 class="card-title"> {{ $partieTypeContrat->titre }} </h2>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="">Titre :</label>
                                <input type="text" class="form-control" name="card_title_value_1" value="{{ $partieTypeContrat->titre }}" readonly>
                            </div>

                            {{-- Si partie d'un type contrat n'a pas d'articles --}}
                            {{-- @if(!$partieTypeContrat->has_articles)
                            <div class="form-group">
                                <label for="">Contenu: </label>
                                <textarea id="summernote_partie{{ $loop->index }}" name="contenu_partie_1" placeholder="" value="1">
                                    {{ $partieTypeContrat->contenu }}
                                </textarea>
                            </div>
                            @endif --}}

                            {{-- Modal editer contenu type contrat partie --}}
                            {{-- @if (!empty($partieTypeContrat->contenu))@endif --}}
                            <div class="form-group">
                                <label for="">
                                    Contenu:
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default-edit-type-contrat-partie-content{{$loop->index}}">
                                              <i class="fas fa-edit"></i>
                                            </button>
                                            {{-- <button type="button" class="btn btn-default">
                                              <i class="fas fa-align-center"></i>
                                            </button>
                                            <button type="button" class="btn btn-default">
                                              <i class="fas fa-align-right"></i>
                                            </button> --}}
                                        </div>
                                    </div>
                                </label>
                                {{-- <textarea id="summernote_partie{{ $loop->index }}" name="contenu_partie_1" placeholder="" value="1">
                                    {{ $partieTypeContrat->contenu }}
                                </textarea> --}}
                            </div>

                            {{-- @if ($partieTypeContrat->has_articles) --}}
                            {{-- <div class="form-group">
                                <button type="button" class="btn btn-default mr-1 float-right" data-toggle="modal" data-target="#modal-default-article{{ $partieTypeContrat->id }}">Ajouter un Article</button>
                            </div> --}}
                            {{-- @endif --}}

                            {{-- Ajouter les articles de chaque partie ici --}}
                            @foreach ($articleTypeContrats as $articleTypeContrat)
                            @if ($partieTypeContrat->id == $articleTypeContrat->type_contrat_partie_id)
                                <div class="form-group">
                                    <label for="">
                                        {{ $articleTypeContrat->intitule_article }} : {{ $articleTypeContrat->titre_article }}

                                        {{-- Modal editer article type contrat --}}
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default-edit-type-contrat-article{{$loop->index}}">
                                                  <i class="fas fa-edit"></i>
                                                </button>
                                                {{-- <button type="button" class="btn btn-default">
                                                  <i class="fas fa-align-center"></i>
                                                </button>
                                                <button type="button" class="btn btn-default">
                                                  <i class="fas fa-align-right"></i>
                                                </button> --}}
                                            </div>
                                        </div>

                                    </label>

                                    {{-- <textarea id="partie_contrat_article{{ $loop->index }}" name="partie_contrat_article{{ $loop->index }}" placeholder="" value="1">
                                        {{ $articleTypeContrat->contenu }}
                                    </textarea> --}}

                                </div>
                            @endif
                                {{-- {{$articleTypeContrat->intitule_article}} --}}
                            @endforeach

                            {{-- @foreach (articleTypeContrats as articleTypeContrat)
                                @if ($partieTypeContrat->id == $articleTypeContrat->type_contrat_partie_id)
                                <div class="form-group">
                                    <label for="">{{ $articleTypeContrat->intitule_article }}</label>
                                    <textarea id="" name="contenu_partie_1" placeholder="" value="1">
                                        {{ $articleTypeContrat->contenu }}
                                    </textarea>
                                </div>
                                @endif
                            @endforeach --}}

                            {{-- Ajouter les routes d'ajouts des articles --}}
                            <div class="form-group">
                                <a href="{{ route('type_contrats.add_article', ['type_contrat_id' => $typeContrat->id, 'type_contrat_partie_id' => $partieTypeContrat->id ]) }}"><button type="button" class="btn btn-default mr-1 float-right">Ajouter un Article</button></a>
                            </div>

                            {{-- <a href="#" class="btn btn-primary float-right">Ajouter un article</a> --}}
                        </div>
                    </div>
                    @endforeach
                </div>

              </div>
            </div>

          </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">Prévisualisation</h5>
                    </div>
                    <div class="card-body">
                    {{-- {{dd(asset('pdf_template.html'))}} --}}
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src=" {{ asset('test.pdf') }} " height="800" width="800" sandbox="allow-same-origin allow-scripts allow-forms" scroll="no" style="overflow: hidden" id="iframe_id"></iframe>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

        <!-- /.modal-bloc -->
        <div class="modal fade" id="modal-default-partie">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une Partie</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="put" action=" {{ route('type_contrats.update', ['type_contrat' => $typeContrat->id]) }} ">

                        <div class="form-group">
                            <label for="">Titre :</label>
                            <input type="text" class="form-control" name="partie_name" placeholder="Définition des conditions d'existence">
                        </div>

                        <div class="form-group" id="hideValuesOnSelect">
                            <label>Contenu :</label>
                            <textarea id="summernote_partie_modal" name="partie_contenu" placeholder="">
                                Saisisez <em>votre</em> <u>texte</u>
                            </textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label>Contient des articles :</label>
                            <select class="form-control select2bs4" name="partie_contrat_contain_articles" style="width: 100%;" onchange="displayDivDemo('hideValuesOnSelect', this)">
                                <option selected="selected" value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div> --}}

                        @csrf
                        <button type="submit" class="btn btn-primary float-right">Enrégistrer</button>
                    </form>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <!-- /.modal-partie-type-contrat -->
        @foreach($partieTypeContrats as $partieTypeContrat)
        {{-- @if ($partieTypeContrat->has_articles) --}}
            <div class="modal fade" id="modal-default-article{{ $partieTypeContrat->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Ajouter un Article</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">

                        <form method="put" action=" {{ route('type_contrats.update', ['type_contrat' => $typeContrat->id]) }} ">

                            @method('put')

                            <input type="hidden" name="type_partie_id" value="{{ $partieTypeContrat->id }}">

                            <div class="form-group">
                                <label for="">Titre :</label>
                                <input type="text" class="form-control" name="article_name" placeholder="Titre de l'article">
                            </div>

                            <div class="form-group">
                                <label>Contenu :</label>
                                <textarea id="summernote_article_modal" name="article_contenu" placeholder="">
                                    Saisisez <em>le contenu</em> <u>de l'article</u>
                                </textarea>
                            </div>

                            @csrf
                            <button type="submit" class="btn btn-primary float-right">Enrégistrer</button>

                        </form>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        {{-- @endif --}}
        @endforeach

        <!-- /.modal-partie-type-contrat -->
        @foreach($partieTypeContrats as $partieTypeContrat)
        {{-- Edit Type Contrat Content --}}
            <div class="modal fade" id="modal-default-edit-type-contrat-partie-content{{$loop->index}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editer le contenu </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="put" action="{{route('type_contrats.update', $partieTypeContrat->id)}}">
                                @csrf
                                {{-- A revoir --}}
                                <input type="hidden" name="edit_type_contrat_partie_id" value="{{$partieTypeContrat->id}}">
                                <div class="form-group">
                                    <label for="">Titre :</label>
                                    <input type="text" class="form-control" name="edit_partie_titre" placeholder="Ex. Définition des conditions d'existence" value="{{$partieTypeContrat->titre}}" readonly>
                                </div>
                                <div class="form-group" id="hideValuesOnSelect">
                                    <label>Contenu :</label>
                                    <textarea id="summernote_type_contrat_content{{$loop->index}}" name="edit_partie_contenu" placeholder="">
                                        {{$partieTypeContrat->contenu}}
                                    </textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Contient des articles :</label>
                                    <select class="form-control select2bs4" name="partie_contrat_contain_articles" style="width: 100%;" onchange="displayDivDemo('hideValuesOnSelect', this)">
                                        <option selected="selected" value="0">Non</option>
                                        <option value="1">Oui</option>
                                    </select>
                                </div> --}}
                                <button type="submit" class="btn btn-primary float-right">Enrégistrer</button>
                            </form>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>





            <!-- /.modal-partie-type-contrat-article -->
            @foreach($articleTypeContrats as $articleTypeContrat)
            @if ($articleTypeContrat->type_contrat_partie_id === $partieTypeContrat->id)
                {{-- Edit Type Contrat Content --}}
                <div class="modal fade" id="modal-default-edit-type-contrat-article{{$loop->index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Editer l'article</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="put" action="{{route('type_contrats.update', $partieTypeContrat->id)}}">
                                    @csrf
                                    {{-- A revoir --}}
                                    <input type="hidden" name="t_contrat_id" value="{{$typeContrat->id}}">
                                    <input type="hidden" name="edit_type_contrat_article_partie_id" value="{{$partieTypeContrat->id}}">
                                    <input type="hidden" name="edit_type_contrat_article_id" value="{{$articleTypeContrat->id}}">
                                    <input type="hidden" name="edit_type_contrat_article_name" value="{{$articleTypeContrat->titre_article}}">
                                    
                                    <div class="form-group">
                                        <label for="">Titre de l'article:</label>
                                        <input type="text" class="form-control" name="edit_article_titre" placeholder="Ex. Objet" value="{{$articleTypeContrat->titre_article}}">
                                    </div>
                                    <div class="form-group" id="hideValuesOnSelect">
                                        <label>Contenu :</label>
                                        <textarea id="summernote_type_contrat_article_content{{$loop->index}}" name="edit_article_contenu" placeholder="">
                                            {{$articleTypeContrat->contenu}}
                                        </textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Contient des articles :</label>
                                        <select class="form-control select2bs4" name="partie_contrat_contain_articles" style="width: 100%;" onchange="displayDivDemo('hideValuesOnSelect', this)">
                                            <option selected="selected" value="0">Non</option>
                                            <option value="1">Oui</option>
                                        </select>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary float-right">Enrégistrer</button>
                                </form>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            </div>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            @endif
            @endforeach








        @endforeach

        
        

        

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
    <footer class="main-footer fixed-bottom">
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
            @foreach($partieTypeContrats as $partieTypeContrat)
                {{-- L_ideal ici serait de faire une boucle for!  nop a cause du status --}}
                $('#summernote_partie{{$loop->index}}').summernote();
            @endforeach
        })

        $(function () {
            @foreach ($articleTypeContrats as $articleTypeContrat)
                $('#partie_contrat_article{{ $loop->index }}').summernote();
            @endforeach
        })

        $(function () {
            @foreach ($partieTypeContrats as $partieTypeContrat)
                $('#summernote_type_contrat_content{{ $loop->index }}').summernote();
            @endforeach
        })

        $(function () {
            @foreach ($articleTypeContrats as $articleTypeContrat)
                $('#summernote_type_contrat_article_content{{ $loop->index }}').summernote();
            @endforeach
        })

        $(function () {
            // Summernote
            $('#summernote_partie_modal').summernote();
            $('#summernote_article_modal').summernote();
        })

        /*var custom_js_card_title_1 = document.querySelector('.custom_js_card_title_1'),
            card_title_value_1 = document.querySelector('.custom_js_card_title_1');
        */

        //iframe_id
        function reload_frame(){
            document.getElementById('iframe_id').contentWindow.location.reload(true);
        }

        //Hide Show
        function displayDivDemo(id, elementValue) {
            document.getElementById(id).style.display = elementValue.value == 0 ? 'block' : 'none';
        }

    </script>

</body>

@endsection
