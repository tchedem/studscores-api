@extends('layouts_perso.base_auth')

@section('title')

@endsection

@section('body-content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p><img src="{{ asset('adminlte/img/sbin_accueil.jpg') }}" alt="" width="120px;" height="60px"></p>
            {{-- <small><a href="route('dashboard')" style="color:black;"><b>C</b>onquete</a></small> --}}
            <a href="#" class="h2">SBIN<b>-</b>Contrat</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Connectez-vous pour démmarer votre session</p>

            {{-- Gestion des erreurs --}}

            <form action="" method="post">

                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Mot de Passe">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><a href="#">Changer Mot de Passe</a></div>
                </div>
                <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}">
            </form>

        </div>
    </div>
</div>
@endsection
