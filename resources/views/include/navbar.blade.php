
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @php
            $user = getLoggedUser();
            $last_pre = explode(' ',$user->prenom);
            echo end($last_pre); 
          @endphp
           <i class="fas fa-power-off"></i></a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a href="{{route('disconnect')}}" class="dropdown-item dropdown-footer bg-danger">
            Se déconnecter 
            <i class="fas fa-sign-out-alt fa-lg"></i>
          </a>
        </div>
      </li>
    </ul>
  </nav>