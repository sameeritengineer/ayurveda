<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
    </div>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <a href="#" class="dropdown-item has-icon text-danger">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-danger">
                  Logout
              </button>
          </form>
            
          </a>
        </div>
      </li>
    </ul>
  </nav>