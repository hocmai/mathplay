<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header"><a href="/">Quay lại trang chủ</a></li>
			@if(Admin::isAdmin())
			<li class="treeview">
				<a href="{{ action('ManagerController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý thành viên</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ action('UserController@index') }}">Quản lý người dùng</a></li>
					<li><a href="{{ action('ManagerController@index') }}">Quản lý quản trị viên</a></li>
					<li><a href="#">Quản lý phân quyền</a></li>
		        </ul>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-folder-open"></i> <span>Quản lý nội dung</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li class="">
						<a href="{{ action('GradeController@index') }}"><i class="fa fa-graduation-cap"></i> Quản lý lớp học<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
						<ul class="">
							<li><a href="#"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<li class="">
						<a href="{{ action('SubjectController@index') }}"><i class="fa fa-briefcase"></i> Quản lý Môn học<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('SubjectController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<li class="">
						<a href="{{ action('ChapterController@index') }}"><i class="fa fa-file-text"></i> Quản lý chuyên đề<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('ChapterController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<li class="">
						<a href="{{ action('LessionController@index') }}"><i class="fa fa-file-text"></i> Quản lý bài tập<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('LessionController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<!-- <li class="">
						<a href="#"><i class="fa fa-book"></i> Quản lý bài kiểm tra<span class="pull-right-container"></span></a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li> -->
		        </ul>
			</li>
			<li class="">
				<a href="#"><i class="fa fa-envelope"> </i> <span>Contact form</span></a>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-puzzle-piece"> </i> <span>Quản lý giao diện</span></a>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-globe"> </i> <span>SEO Master</span></a>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-cog"> </i> <span>Cấu hình Site</span></a>
			</li>
			@endif
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>