@extends('layouts_perso.base_auth')

@section('title')
<title>StudScore API Manager | Log in</title>
@endsection

@section('body-content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p><img src="{{ asset('adminlte/img/uac_logo.jpg') }}" alt="" width="120px;" height="80px"></p>
            {{-- <small><a href="route('dashboard')" style="color:black;"><b>C</b>onquete</a></small> --}}
            <a href="#" class="h2">Studscore<b>-</b>API</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Connectez-vous pour démmarer votre session</p>

            {{-- Gestion des erreurs --}}

            <form action="" method="post">
                @csrf
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
                <div class="row text-center">
                    <div class="col-md-12"><a href="#">J'ai oublier mon mot de Passe</a></div>
                </div>
                <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}">
            </form>

        </div>
    </div>
</div>
@endsection
