@extends('admin.layout.default')

@section('title')
{{ $title = isset($data) ? 'Sửa bản ghi' : 'Tạo mới bản ghi' }} | Quản lý phòng thu
@stop

@section('content')

@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('GradeController@index') }}" class="btn btn-success">Danh sách bản ghi</a>
	</div>
</div>
@endif

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => isset($data) ? ['AudioController@update', $data->id] : ['AudioController@store'], 'method' => isset($data) ? 'PUT' : 'POST', 'files' => true)) }}
				<div class="box-body">
					<div class="row col-sm-6">
						<div class="form-group">
							{{ Form::label('title', 'Tiêu đề') }}
							{{ Form::text('title', !empty($data->title) ? $data->title : '', ['class' => 'form-control', 'size' => 60, 'required' => true]) }}
						</div>
						<div class="form-group">
							{{ Form::checkbox('use-record', '1', false, ['id' => 'use-record']) }}
							{{ Form::label('use-record', 'Thu âm trực tiếp') }}
						</div>

						<div class="form-group clearfix record-area text-center hide">
							<button class="btn btn-default pull-left record-button" type="button"><i class="fa fa-microphone"></i></button>
							<div class="record-controls pull-left" style="display: none">
								<button class="btn btn-default pull-left play" type="button"><i class="fa fa-play" aria-hidden="true"></i></button>
								{{-- <button class="btn btn-default pull-left pause" type="button"><i class="fa fa-pause" aria-hidden="true"></i></button> --}}
								<button class="btn btn-default pull-left record-controls stop disabled" type="button"><i class="fa fa-stop" aria-hidden="true"></i></button>
							</div>
							<div class="pull-left" style="margin-top: -2px; margin-left: 10px;">
								<canvas id="analyser" width="380px" height="35" style="background:#333"></canvas>
							</div>

							{{ Form::hidden('tmp_record', '', ['class'=>'tmp-record-input']) }}
							<div class="record-download inline-block hide">
								<span class="audio pull-left">
									<video width="100%" height="32px" controls=""><source src="http://localhost:8000/upload/studio/demcacsoden12.wav" type="audio/wav"></video>
								</span>
								<button class="btn btn-info save-record pull-left disabled" style="padding: 5px 10px;" title="Lưu lại file ghi âm này" type="button"><i class="fa fa-save"></i></button>
							</div>
						</div>

						<div class="form-group" id="upload-sound">
							<div class="panel panel-default" style="margin: 0">
				                <div class="panel-heading"><label>Tải file âm thanh</label></div>
				                <div class="panel-body">
			                        {{ Form::file('sound', ['accept' => '.mp3, .mav, .MIDI']) }}
				                    <div class="clear clearfix"></div>
				                    <span class="help">
				                        Định dạng file: wav, mp3, MIDI<br/>
				                        Dung lượng tối đa: {{ ini_get('upload_max_filesize') }}
				                    </span>
				                </div>
				            </div>
						</div>
						
						@if(!empty($data->url))
						 	<a href="{{ $data->url }}" target="_blank">{{ basename($data->url) }}</a>{{ Form::hidden('url', $data->url) }}
						@endif

					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<input type="submit" class="btn btn-primary" value="Lưu lại" />
					<input type="button" class="btn btn-default" value="Hủy" />
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>

@stop

@section('script')
	{{ HTML::script('adminlte/custom/recorder.js') }}
	{{ HTML::script('adminlte/custom/audio-recorder.js') }}
@stop