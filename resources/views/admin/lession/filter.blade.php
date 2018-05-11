<div class="box alert">
	{{ Form::open(['action' => 'LessionController@search', 'method' => 'GET']) }}
		<div class="input-group inline-block">
			<label>Tiêu đề</label>
			{{ Form::text('title', Input::get('title'), ['class' => 'form-control', 'placeholder' => 'Tiêu đề']) }}
		</div>
		<div class="input-group inline-block">
			<label>Dạng bài</label>
			<div class="clear clearfix"></div>
			<select name="type" class="form-control selectpicker" data-live-search="true">
				<option value="">-- Tất cả --</option>
				@foreach( CommonQuestion::getAllType() as $index => $value )
					<option{{ ($index == Input::get('type')) ? ' selected' : '' }} data-tokens="{{ str_slug($value, ' ').' '.$value }}" value="{{ $index }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
		<div class="input-group inline-block">
			<label style="display: block;">Chuyên đề</label>
		  	{{ Form::select('chapter', ['' => '--Tất cả--'] + Common::getChapterList(), Input::get('chapter'), ['class' => 'form-control', 'style' => 'max-width: 200px']) }}
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