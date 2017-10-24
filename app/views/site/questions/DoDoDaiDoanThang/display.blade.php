<?php
$length = rand(1,10);
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
<div class="description">
	
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $length }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content">
				<div class="work-area inline-block form-group">
					<div class="line-wrapper"><span class="line" style="width: {{ $length*10  }}%"></span></div>
					<div class="sort-area">
						<span class="ruller"><img src="{{ asset('questions/DoDoDaiDoanThang/img/wood-ruler.png') }}"></span>
					</div>
				</div>

				<div class="clearfix"></div>
				<div>
					<span>Đoạn thẳng trên dài </span>{{ Form::text('answer', '', ['class'=>'text-center', 'style'=>'width:40px']) }}<span> cm</span>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>