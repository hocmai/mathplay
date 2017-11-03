<?php
$num = rand(10, 90);
$range = getRandArrayVal(range($num-5, $num+5), 3);
$range[] = $num;
shuffle($range);
// debug($range);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="description">
	Số {{ $num }} gồm {{ floor($num/10) }} chục và {{ $num-(floor($num/10)*10) }} đơn vị. Đáp án nào dưới đây đúng với số {{ $num }}?
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $num }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="">
					@foreach( $range as $key => $value )
						<div class="radio">
							{{ Form::radio('answer', $value, false, ['id' => $question_num.'-'.$key]) }}
							<label for="{{ $question_num.'-'.$key }}">
								{{ (floor($value/10) > 1 ) ? (floor($value/10)-1).' chục cộng '.( $value - ((floor($value/10)-1)*10) ).' đơn vị' : floor($value/10).' chục cộng '.($value-(floor($value/10)*10)).' đơn vị' }}
							</label>
						</div>
						{{ ($key == 1) ? '<div class="clearfix"></div>' : '' }}
					@endforeach
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>