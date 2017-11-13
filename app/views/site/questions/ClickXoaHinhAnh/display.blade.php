<?php 
$min = !empty($option['min']) ? $option['min'] : 2;
$max = !empty($option['max']) ? $option['max'] : rand(3,10);

$num = rand($min, $max);
$sub = rand(1, $num-1);
$images = CommonQuestion::getImgData('ClickXoaHinhAnh');
$imageRand = array_rand($images);
?>
@include('site.questions.render-title', ['question' => $question, 'desc' => "Có $num $imageRand. Hãy sử dụng chuột bỏ đi $sub $imageRand và để lại ".($num - $sub)." quả (nháy chuột lần nữa để thêm lại)"])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $num - $sub }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value=""/>
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="list-images form-group">
					@for($i = 1; $i <= $num; $i++)
						<div class="pull-left item"><img width="50px" src="{{ asset($images[$imageRand]) }}"></div>
					@endfor
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>