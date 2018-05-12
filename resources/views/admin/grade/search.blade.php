<div class="box alert">
	{{ Form::open(['action' => 'GradeController@search', 'method' => 'GET']) }}
		<div class="input-group inline-block">
			<label>Tiêu đề</label>
			{{ Form::text('title', request()->get('title'), ['class' => 'form-control', 'placeholder' => 'Tiêu đề']) }}
		</div>
		<div class="input-group inline-block">
			<label style="display: block;">Trạng thái</label>
		  	{{ Form::select('status', ['' => '--Tất cả--', '0' => 'Chưa công bố', 1 => 'Đã công bố'], request()->get('status'), ['class' => 'form-control']) }}
		</div>
		<div class="input-group inline-block" style="vertical-align: bottom;">
			<button type="submit" class="btn btn-primary">Tìm kiếm</button>
			{{ link_to_action('GradeController@index', 'Reset', null, ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
</div>