<header class="main-header">
  <!-- Logo -->
  <a href="{{ action('Admin\ManagerController@index') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">M<b style="color: orange">P</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b style="color: orange">M</b>ath<b style="color: orange">P</b>lay</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Menu</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="user">
          <a href="#"><i class="fa fa-user"></i>{{ \Common::getObject(\Auth::guard('admin')->user(), 'username') }}</a>
        </li>

        <li class="user">
        	<a href="{{ action('Admin\ManagerController@edit', \Common::getObject(\Auth::guard('admin')->user(), 'id')) }}"><i class="fa fa-user"></i>Tài khoản</a>
        </li>

        <li class="user">
        	<a href="{{ action('Admin\AdminController@logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a>
        </li>

      </ul>
    </div>
  </nav>
</header>