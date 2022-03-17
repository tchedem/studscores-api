        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
            <a href="#" class="navbar-brand">
                {{-- <img src="{{ asset('img/favicon/112529.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">Student Score API Manager</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                <li class="nav-item">
                <li class="nav-item">
                <!-- <li class="nav-item" style="background-color: rgb(238 253 176 / 71%); border-radius:70px;"> -->
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    {{-- <a href=" {{ path('contrats') }} " class="nav-link">Ouvrir un document</a> --}}
                    {{-- <a href="  " class="nav-link">Ouvrir un document</a> --}}
                </li>

                </ul>

                <!-- SEARCH FORM (Top Menu) -->

            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="dropdown" href="#"
                    onclick="document.getElementById('logout-form').submit()" title="Se deconneter">
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>
                        <i class="fas fa-power-off" style=""></i>
                    </a>
                </li>

            </ul>
            </div>
        </nav>
