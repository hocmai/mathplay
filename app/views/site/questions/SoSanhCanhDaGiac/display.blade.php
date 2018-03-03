<?php
$num = getRandArrayVal(range(3,8), 2);
$answer = getRandArrayVal($num);
$find = getRandArrayVal(['cạnh', 'đỉnh']);
?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => ['Hình nào có số', $find, ($answer < $num[1]) ? 'bé hơn' : 'lớn hơn'] ])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="content inline-block">
			@for($i = 0; $i < 2; $i++)
				<div class="form-group inline-block radio-box">
					<input class="hidden" type="radio" value="{{ $num[$i] }}" name="answer" id="answer-{{ $question->id.'-'.$question_num.'-'.$i }}">
					<label for="answer-{{ $question->id.'-'.$question_num.'-'.$i }}">
						<div class="shape">
							{{ SoSanhCanhDaGiac::renderShape($num[$i]) }}
						</div>
					</label>
				</div>
			@endfor
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.so_sanh_cach_da_giac')
