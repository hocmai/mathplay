<div class="margin-bottom">
	{{ Form::open(['action' => 'LessionController@search', 'method' => 'GET']) }}
		<div class="input-group inline-block">
			<label>Tiêu đề</label>
			{{ Form::text('title', Input::get('title'), ['class' => 'form-control', 'placeholder' => 'Tiêu đề']) }}
		</div>
		<div class="input-group inline-block">
			<label style="display: block;">Chuyên đề</label>
		  	{{ Form::select('chapter', ['' => '--Tất cả--'] + Common::getChapterList(), Input::get('chapter'), ['class' => 'form-control', 'style' => 'max-width: 220px']) }}
		</div>
		<div class="input-group inline-block">
			<label style="display: block;">Môn học</label>
		  	{{ Form::select('subject', ['' => '--Tất cả--'] + Common::getSubjectList(), Input::get('subject'), ['class' => 'form-control']) }}
		</div>
		<div class="input-group inline-block">
			<label style="display: block;">Lớp</label>
		  	{{ Form::select('grade', ['' => '--Tất cả--'] + Common::getGradeList(), Input::get('grade'), ['class' => 'form-control']) }}
		</div>
		<div class="input-group inline-block">
			<label style="display: block;">Trạng thái</label>
		  	{{ Form::select('status', ['' => '--Tất cả--', '0' => 'Chưa công bố', 1 => 'Đã công bố'], Input::get('status'), ['class' => 'form-control']) }}
		</div>
		<div class="input-group inline-block" style="vertical-align: bottom;">
			<button type="submit" class="btn btn-primary">Tìm kiếm</button>
			{{ link_to_action('LessionController@index', 'Reset', null, ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
</div>