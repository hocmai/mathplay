<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header"><a href="/">Quay lại</a></li>
			@if(Admin::isAdmin())
			<li>
				<a href="{{ action('ManagerController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý thành viên</span>
				</a>
			</li>
			@endif
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>