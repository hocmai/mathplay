<?php
$min_group = !empty($config['group_min']) ? $config['group_min'] : 2;
$max_group = !empty($config['group_max']) ? $config['group_max'] : 5;
$each_min = !empty($config['each_min']) ? $config['each_min'] : 2;
$each_max = !empty($config['each_max']) ? $config['each_max'] : 5;
$min_a = !empty($config['min_a']) ? $config['min_a'] : 1;
$max_a = !empty($config['max_a']) ? $config['max_a'] : 100;
$min_b = !empty($config['min_b']) ? $config['min_b'] : 1;
$max_b = !empty($config['max_b']) ? $config['max_b'] : 10;

$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['chia_img', 'chia']);
$desc ='';
if( $type == 'chia_img'){
	$group = rand($min_group, $max_group);
	$each = rand($each_min, $each_max);
	$imagesData = CommonQuestion::getImgData('TongCacNhomHinh');
	$imageShow = array_rand($imagesData);
	$answer = ($group*$each)/$group;
// dd($answer);
	$desc = ' Điền đáp án đúng vào ô trống';
}else{
	$a = rand($min_a,$max_a);
	$b =rand($min_b,$max_b);
	$answer = ($a*$b)/$a;
	$answer = $b;
	// dd($b);
	$desc = ' Tính ';
}

?>
@include('site.questions.render-title', ['question' => $question ,'desc' => $desc])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer  }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if($type == 'chia_img')
					<div class="question-content inline-block">
						@for ($i = 0; $i < $group; $i++)
							<div class="circle" style="transform: rotate({{ rand(0, 360) }}deg);">
								<div class="cont">
									@for ($j = 0; $j < $each; $j++)
										<span class="inline-block text-center"><img src="{{ asset($imagesData[$imageShow]) }}" width="30px" height="30px"></span>
									@endfor
								</div>
							</div>
						@endfor
					</div>
					<div class="clear clear-fix"></div>
					<div class="chia_img inline-block">
						{{ ($group*$each).' : '.$group.' = ' }}<span class="answer">{{ Form::text('answer', ' ',['class' => 'inline-block','style' => 'width:40px']) }}</span>
					</div>
				@else
					<div class="chia_img inline-block">
						{{ ($a*$b).' : '.$a.' = ' }}<span class="answer">{{ Form::text('answer', ' ',['class' => 'inline-block','style' => 'width:40px']) }}</span>
					</div>
				@endif	
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.phep_chia_2_so')
