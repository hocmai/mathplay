<!DOCTYPE html>
<html>
@include('admin.common.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.common.navbar')

  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.common.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="inline-block">
		    @yield('title')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<!-- Notifications: message/alert/waring -->
    	@include('admin.common.message')
    	<!-- ./ notifications: message/alert/waring -->
		<!-- Content -->
    	@yield('content')
    	<!-- ./ content -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017</strong>
  </footer>

</div>
<!-- ./wrapper -->

{{-- @include('admin.common.footer') --}}
</body>
</html>