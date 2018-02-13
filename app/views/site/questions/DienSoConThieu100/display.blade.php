<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 100;
$num_ans = rand(1,3);
$answer_rand = (array)array_rand(range($min, $max), $num_ans);
foreach ($answer_rand as $value) {
	$answer[] = range($min, $max)[$value];
}
// dd($answer_rand);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value='{{ json_encode($answer) }}' />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" />
		
		<div class="form-group number-line-100">
			<div class="content">
				<table border="1">
					@for($i = 0; $i < 10; $i++)
						<tr>
							@for($j = ($i*10)+1; $j <= ($i*10)+10; $j++)
								<td><div class="text">{{ in_array($j, $answer) ? Form::text('answer_'.$j,'', ['required' => true]) : $j }}</div></td>
							@endfor
						</tr>
					@endfor
				</table>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.dien_so_con_thieu_100')