<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <?php
      $isActiveRoute = function(){

      }
    ?>
    <li class="nav-item {{ Route::is('userdashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('userdashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('user.profile') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('user.profile')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">My Profile</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('user.review') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('user.review')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Reviews</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('user.orders.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('user.orders.index')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">All Orders</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('user.orders.pending') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('user.orders.pending')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Pending Orders</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('user.orders.completed') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('user.orders.completed')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Completed Orders</span>
    <li class="nav-item  @isActiveRoute(['user.address', 'user.address.edit'])">
      <a class="nav-link" href="{{route('user.address')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Address</span>
      </a>
    </li>
    <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="icon-grid menu-icon"></i>
        <span class="menu-title">Log out</span></a>
        </form>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li> -->
  </ul>
</nav>