<?php 
if(!isset($key)) $key = 0;
if(!isset($question)) $question = null;
if(!isset($question)) $lession = null;
$_lessionQuestionConf = LessionQuestion::where('lession_id', '=' , Common::getObject($lession, 'id'))
->where('qid', '=' , Common::getObject($question, 'id'))
->pluck('config');
$lessionQuestionConf = !empty($_lessionQuestionConf) ? (array)json_decode($_lessionQuestionConf) : [];
$uique = str_random(10);
?>

<div class="panel panel-default" id="{{$key}}">
	{{ Form::hidden('question[id][]', Common::getObject($question, 'id')) }}
    <div class="panel-heading" role="tab" id="heading-{{$key}}">
    	<h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}" aria-expanded="{{ ($key>0) ? 'false' : 'true' }}" aria-controls="collapse-{{$key}}">
		        @if($question)
		        	{{ $question->title }} (câu {{ !empty($lessionQuestionConf['question_start']) ? $lessionQuestionConf['question_start'] : '?'}} - câu {{ !empty($lessionQuestionConf['question_end']) ? $lessionQuestionConf['question_end'] : '?' }})
		        	}
		        @else
		        	Tạo mới câu hỏi
		        @endif
	        </a>
	        @if(!$question)
	        	<button type="button" class="close"><span aria-hidden="false">&times;</span></button>
	        @endif
    	</h4>
    </div>

    <div id="collapse-{{$key}}" class="panel-collapse collapse {{ ($key==0) ? 'in' : '' }}" role="tabpanel" aria-labelledby="heading-{{$key}}">
    	<div class="panel-body">
			<div class="form-group">
				<label>Tiêu đề</label>
				{{ Form::text('question[title][]', Common::getObject($question, 'title'), ['class' => 'form-control', 'required' => true]) }}
			</div>
			<div class="row">
				<div class="form-group col-sm-5">
					<label>Từ câu số</label>
					{{ Form::number('question_config[question_start][]', !empty($lessionQuestionConf['question_start']) ? $lessionQuestionConf['question_start'] : '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group col-sm-5">
					<label>Đến câu số</label>
					{{ Form::number('question_config[question_end][]', !empty($lessionQuestionConf['question_end']) ? $lessionQuestionConf['question_end'] : '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="form-group">
				<label>Nội dung</label>
				{{ Form::textarea('question[content][]', Common::getObject($question, 'content'), ['class' => 'form-control editor', 'rows' => 5, 'id' => 'editor-'.$uique]) }}
				@if($key > 0)
					<script type="text/javascript">
						CKEDITOR.replace( 'editor-{{ $uique }}' );
						CKEDITOR.add
					</script>
				@endif
			</div>
			{{ Form::hidden('sound_title[]', !empty($lessionQuestionConf['sound_title']) ? $lessionQuestionConf['sound_title'] : '') }}
			<div class="form-group" id="get-auto-sound">
				{{ Form::checkbox('question_config[get_auto_sound][]', 'auto', false, ['id' => 'auto-sound-'.$key]) }}
				<label for="{{ 'auto-sound-'.$key }}">Tự động tải về âm thanh</label>
			</div>
			<div class="form-group" id="upload-sound">
				<div class="panel panel-default" style="margin: 0">
	                <div class="panel-heading"><label>Tải file âm thanh</label></div>
	                <div class="panel-body">
	                	@if(!empty($lessionQuestionConf['sound_title']))
	                		<a href="{{ $lessionQuestionConf['sound_title'] }}" target="_blank">{{ basename($lessionQuestionConf['sound_title']) }}</a>
	                		<p></p>
	                	@endif
                        {{ Form::file('question_config[sound_input][]', ['accept' => '.mp3, .mav, .MIDI']) }}
	                    <div class="clear clearfix"></div>
	                    <span class="help">
	                        Định dạng file: <br/>
	                        Dung lượng tối đa: {{ ini_get('upload_max_filesize') }}
	                    </span>
	                </div>
	            </div>
			</div>
			<div class="form-group">
				<label>Dạng câu hỏi</label>
				<select name="question[type][]" class="form-control get-question-form-config{{ ($key>0) ? ' selectpicker' : '' }}" required="1" data-live-search="true">
					<option value="">-- Chọn --</option>
					@foreach( CommonQuestion::getAllType() as $key => $value )
						<option{{ ($key == Common::getObject($question, 'type')) ? ' selected' : '' }} data-tokens="{{ Str::slug($value, ' ').' '.$value }}" value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
			</div>
			<div id="get-config-form" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading">
				{{ CommonQuestion::getConfigForm(Common::getObject($question, 'type'), $lessionQuestionConf) }}
			</div>
			@if($lession && $question)
				<div class="form-group">
					<a class="btn btn-danger delete-question pull-right" qid="{{ Common::getObject($question, 'id') }}" lession_id="{{ Common::getObject($lession, 'id') }}">Xóa</a>
				</div>
			@endif
    	</div>
    </div>
</div>