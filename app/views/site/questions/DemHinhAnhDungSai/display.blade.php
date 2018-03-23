<?php
$min = (!empty($config['min_value']) && $config['min_value'] > 0) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 20;
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['choose', 'input']);

$answer_range = getRandArrayVal(range($min, $max), 2);
$images = CommonQuestion::getImgData('DemHinhAnhDungSai');

if( count($images) ) {
    $image_rand = array_rand($images);
}
$num1 = $answer_range[0];
$num2 = $answer_range[1];
$answer = getRandArrayVal([$num1, $num2]);
 ?>

@include('site.questions.render-title', ['question' => $question, 'desc' => 'Hình ảnh biểu diễn số '.$answer.' là?'])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="radio">
                    <input id="dungsai-answer-{{ $question_num }}1" type="radio" name="answer" value="{{ $num1 }}" class="">
                    <label for="dungsai-answer-{{ $question_num }}1">
                        @for($i = 1; $i <= $num1; $i++)
                            <img src="{{ !empty($images) ? $images[$image_rand] : '' }}" width="35px" style="margin: 0 5px" class="img-responsive pull-left" alt=""/>
                        @endfor
                    </label>
                </div>
                <div class="radio">
                    <input id="dungsai-answer-{{ $question_num }}2" type="radio" name="answer" value="{{ $num2 }}" class="">
                    <label for="dungsai-answer-{{ $question_num }}2">
                        @for($i = 1; $i <= $num2; $i++)
                            <img src="{{ !empty($images) ? $images[$image_rand] : '' }}" width="35px" style="margin: 0 5px" class="img-responsive pull-left" alt=""/>
                        @endfor
                    </label>
            	</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.dem_hinh_anh_dung_sai')