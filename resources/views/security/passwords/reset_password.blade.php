@extends('layouts_perso.base_auth')

@section('title')

@endsection

@section('body-content')
<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href=" {{ route('login') }} " class="h1">Contrat</a>
      </div>
      <div class="card-body">

        {{-- Gestion des erreurs --}}

        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="#">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=" {{ asset('plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- AdminLTE App -->
<script src=" {{ asset('dist/js/adminlte.min.js') }} "></script>

@endsection