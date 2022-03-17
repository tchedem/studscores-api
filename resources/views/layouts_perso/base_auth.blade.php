<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        {{-- <title> {{ config("app.name") }} | {{ $title ?? 'Dashboard' }}  </title> --}}
        @yield('title')

        <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/favicon/112529.png') }}"/>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href=" {{ asset('adminlte/dist/css/adminlte.min.css') }} "/>

    </head>

    <body class="hold-transition login-page">
        @yield('body-content')
    </body>
</html>
