<?php 
if(!isset($key)) $key = 0;
if(!isset($question)) $question = null;
if(!isset($question)) $lession = null;
$lessionQuestionConf = LessionQuestion::where('lession_id', '=' , Common::getObject($lession, 'id'))
->where('qid', '=' , Common::getObject($question, 'id'))
->pluck('config');
$lessionQuestionConf = $lessionQuestionConf ? (array)json_decode($lessionQuestionConf) : [];
?>

<div class="panel panel-default" id="{{$key}}">
	{{ Form::hidden('question[id][]', Common::getObject($question, 'id')) }}
    <div class="panel-heading" role="tab" id="heading-{{$key}}">
    	<h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}" aria-expanded="{{ ($key>0) ? 'false' : 'true' }}" aria-controls="collapse-{{$key}}">
		        @if($question) 
		        	{{ $question->title }} (câu {{ !empty($lessionQuestionConf['question_start']) ? $lessionQuestionConf['question_start'] : '?'}} - câu {{ !empty($lessionQuestionConf['question_end']) ? $lessionQuestionConf['question_end'] : '?' }})
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
				{{ Form::textarea('question[content][]', Common::getObject($question, 'description'), ['class' => 'form-control', 'rows' => 5]) }}
			</div>
			<div class="form-group">
				<label>Dạng câu hỏi</label>
				{{ Form::select('question[type][]', ['' => '-- Chọn --'] + CommonQuestion::getAllType(), Common::getObject($question, 'type'), ['class' => 'form-control get-question-form-config '.(($key>0) ? 'selectpicker' : ''), 'required' => true, 'data-live-search' => true]) }}
			</div>
			<div id="get-config-form" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading">
				{{ CommonQuestion::getConfigForm(Common::getObject($question, 'type'), $lessionQuestionConf) }}
			</div>
			@if($lession && $question)
				<div class="form-group">
					<a class="btn btn-danger delete-question pull-right" qid="{{ Common::getObject($question, 'id') }}" lession_id="{{ Common::getObject($lession, 'id') }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
				</div>
			@endif
    	</div>
    </div>
</div>