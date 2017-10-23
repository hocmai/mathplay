<?php 
$img = CommonQuestion::getRandImg('GhepHinhThanhDay');
$imgRand = array_rand($img, 2);
$numTotal = rand(6,15);
$numHide = rand(3,4);

$answer = '';
for ($i=($numTotal - $numHide); $i < $numTotal; $i++) { 
	$answer .= $i%2;
}
?>

<div class="start">
	@if(!empty($config['sound_title']))
		<div class="play-question-sound">
			<button class="control play"></button>
			<video class="hidden">
				<source src="{{ $config['sound_title'] }}" type="" type="audio/mpeg">
			</video>
		</div>
	@endif
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="list-img">
					@for($i = 0; $i < $numTotal; $i++)
						<div class="item inline-block pull-left {{ ( $i < ($numTotal - $numHide) ) ? '" data-val="'.($i%2).'"' : 'none"' }}">
							@if($i < ($numTotal - $numHide))
								<img src="{{ asset($img[$imgRand[$i%2]]) }}" width="50" height="50" />
							@endif
						</div>
					@endfor
					<input type="hidden" name="answer">
				</div>
				<div class="clear clearfix"></div>
				<div class="item-source">
					<div class="item pull-left inline-block" data-val="0"><img src="{{ $img[$imgRand[0]] }}" width="50" height="50" /></div>
					<div class="item pull-left inline-block" data-val="1"><img src="{{ $img[$imgRand[1]] }}" width="50" height="50" /></div>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>