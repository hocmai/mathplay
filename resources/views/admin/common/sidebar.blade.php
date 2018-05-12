<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header"><a href="/">Quay lại trang chủ</a></li>
			@if(App\Models\Admin::isAdmin())
			<li class="treeview">
				<a href="{{ action('Admin\ManagerController@index') }}">
					<i class="fa fa-users"></i> <span>Quản lý thành viên</span>
					<span class="pull-right-container"><i class="fa fa-angle-down"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ action('Admin\UserController@index') }}">Quản lý người dùng</a></li>
					<li><a href="{{ action('Admin\ManagerController@index') }}">Quản lý quản trị viên</a></li>
					<li><a href="#">Quản lý phân quyền</a></li>
		        </ul>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-folder-open"></i> <span>Quản lý nội dung</span>
					<span class="pull-right-container"><i class="fa fa-angle-down"></i></span>
				</a>
				<ul class="treeview-menu">
					<li class="">
						<a href="{{ action('Admin\GradeController@index') }}"><i class="fa fa-graduation-cap"></i> Quản lý lớp học<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('Admin\GradeController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<li class="">
						<a href="{{ action('Admin\SubjectController@index') }}"><i class="fa fa-briefcase"></i> Quản lý Môn học<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('Admin\SubjectController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<li class="">
						<a href="{{ action('Admin\ChapterController@index') }}"><i class="fa fa-file-text"></i> Quản lý chuyên đề<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('Admin\ChapterController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
						</ul>
					</li>
					<li class="">
						<a href="{{ action('Admin\LessionController@index') }}"><i class="fa fa-file-text"></i> Quản lý bài tập<span class="pull-right-container"></span></a>
						<ul class="">
							<li><a href="{{ action('Admin\LessionController@create') }}"><i class="fa fa-plus-square"></i> Thêm mới</a></li>
							<li><a href="{{ action('Admin\ConfLessionController@index') }}"><i class="fa fa-plus-square"></i> Cấu hình bài tập</a></li>
							<li><a href="{{ action('Admin\QuestionTypeController@index') }}"><i class="fa fa-plus-square"></i> Quản lý dạng bài</a></li>
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
			<li class="treeview">
				<a href="{{ action('Admin\AudioController@index') }}"><i class="fa fa-microphone"></i> <span>Phòng thu</span>
				<span class="pull-right-container"><i class="fa fa-angle-down"></i></span></a>
				
				<ul class="treeview-menu">
					<li><a href="{{ action('Admin\AudioController@index') }}"><i class="fa fa-list"></i> Danh sách</a></li>
					<li><a href="{{ action('Admin\AudioController@create') }}"><i class="fa fa-plus-square"></i> Tạo mới</a></li>
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