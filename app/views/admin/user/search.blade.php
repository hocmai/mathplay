<div class="margin-bottom">
	{{ Form::open(array('action' => 'UserController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Từ khóa</label>
		  	<input type="text" name="keyword" class="form-control" placeholder="Search" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên người dùng </label>
		  	{{ Form::select('username', selectUserName(), null, array('class' =>'form-control')) }}
		</div>

		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Từ ngày đăng nhập</label>
		  	<input type="text" name="start_date" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Đến ngày đăng nhập</label>
		  	<input type="text" name="end_date" class="form-control" id="datepickerEnddate" placeholder="Đến ngày" />
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
			{{ link_to_action('UserController@index', 'Reset', null, ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
</div>