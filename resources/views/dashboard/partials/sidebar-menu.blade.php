    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          {{-- <img src="{{ asset('img/favicon/112529.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">Student Score API Manager</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"> {{ auth()->user()->name }} </a>
            </div>
          </div>

          <!-- SidebarSearch Form -->

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href=" {{ route('dashboard') }} " class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Types Contrats
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="  " class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ajouter</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="  " class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Liste</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Contrats
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="  " class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="  " class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>