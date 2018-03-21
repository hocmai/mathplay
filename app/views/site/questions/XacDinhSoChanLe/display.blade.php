<?php
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['coin', 'basic']);
$max = (!empty($config['max']) ) ? $config['max'] : 20;

$numRand = rand(1,$max);
$imageData = CommonQuestion::getImgData('XacDinhSoChanLe');
$imageRand = getRandArrayVal($imageData);

?>

@if($type == 'coin')
	@include('site.questions.render-title', ['question' => $question, 'desc' => "Số lượng hinh ảnh dưới đây là số chẵn hay số lẻ?"])
@else
	@include('site.questions.render-title', ['question' => $question, 'desc' => $numRand." là số chẵn hay số lẻ?"])
@endif
<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $numRand%2 }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if($type == 'coin')
		<div class="form-group">
			<div class="content inline-block">
				<div class="image-show">
					@for($i = 1; $i <= floor($numRand/2); $i++)
						<div class="pull-left" style="margin: 10px">
							<img src="{{ $imageRand }}" width="30" />
						</div>
					@endfor
					<div class="clear clear fix"></div>
					@for($i = floor($numRand/2)+1; $i <= $numRand; $i++)
						<div class="pull-left" style="margin: 10px">
							<img src="{{ $imageRand }}" width="30" />
						</div>
					@endfor
				</div>
			</div>
		</div>
		@endif
		<div class="inline-block">
			<div class="radio">
                <input id="chanle-answer-{{ $question_num }}1" type="radio" name="answer" value="0" class="">
                <label for="chanle-answer-{{ $question_num }}1">
                    Chẵn
                </label>
            </div>
            <div class="radio">
                <input id="chanle-answer-{{ $question_num }}2" type="radio" name="answer" value="1" class="">
                <label for="chanle-answer-{{ $question_num }}2">
                    Lẻ
                </label>
            </div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.xac_dinh_so_chan_le')