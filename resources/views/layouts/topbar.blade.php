  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>VR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Indihome</b>VR</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          @guest
	          	<li class="nav-item">
	                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	            </li>
	            @if (Route::has('register'))
	                <li class="nav-item">
	                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	                </li>
	            @endif
	       @else
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </div>
              </li>
            </ul>
          </li>
          @endguest
        </ul>
      </div>
    </nav>
  </header>