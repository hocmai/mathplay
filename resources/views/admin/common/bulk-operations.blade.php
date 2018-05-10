{{ Form::open(['action' => 'AdminController@operation', 'method' => 'POST', 'id' => 'bulk-operation-form', 'class' => 'inline-block']) }}
	{{ Form::hidden('model', $model) }}
	{{ Form::hidden('data') }}
	<div class="inline-block input-group">
		{{ Form::select('action', ['' => '- Thao tác -', 'delete' => 'Xóa', 'unpublic' => 'Bỏ công bố', 'public' => 'Công bố'], '', ['class' => 'form-control', 'required' => true]) }}
	</div>
	<div class="inline-block input-group" style="vertical-align: top;">
		{{ Form::submit('Áp dụng cho các mục được chọn', ['class' => 'btn btn-primary	']) }}
	</div>
{{ Form::close() }}