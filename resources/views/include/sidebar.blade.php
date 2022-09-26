
  <aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link elevation-3">
      <img src="{{asset('assets/dist/img/rotaract-logo.png')}}" alt="Logo"  height="50"> <br>
      <span class="brand-text font-weight-light">Ouagadougou Doyen</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pt-3 pb-3 mb-3 d-flex elevation-2">
        <div class="image">
          <img src="{{asset('assets/dist/img/user-icon.svg')}}" class="img-circle elevation-1" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @php
              $user = getLoggedUser();
              echo $user->nom.' '.$user->prenom;
            @endphp
          </a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link {{ Request::routeIs('dashboard.index') ? 'active' : '' }}">
              <i class="fas fa-home"></i>
              <p>Accueil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('membre.index')}}" class="nav-link {{ Request::routeIs('membre.index') || Request::routeIs('membre.create') ? 'active' : '' }}">
              <i class="fas fa-users"></i>
              <p>Membres</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('cotisation.index')}}" class="nav-link {{ Request::routeIs('cotisation.index') ? 'active' : '' }}">
              <i class="fas fa-wallet"></i>
              <p>Cotisations</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('brouillard.index')}}" class="nav-link {{ Request::routeIs('brouillard.index') || Request::routeIs('brouillard.create') ? 'active' : '' }}">
              <i class="fas fa-list-alt"></i>
              <p>Brouillard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cog"></i>
              <p>Reglages</p>
            </a>
          </li>
          <br><br><br><br>
          <li class="nav-item bg-dark">
            <a href="{{route('disconnect')}}" class="nav-link">
              <i class="fas fa-power-off"></i>
              <p>Déconnexion</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
