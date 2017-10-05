<?php
	$min = (!empty($config['min_value']) ) ? $config['min_value'] : 1;
	$max = (!empty($config['max_value']) ) ? $config['max_value'] : 10;
	$answertype = !empty($config['answer_type']) ? $config['answer_type'] : 'rand';
	if( $answertype == 'rand' ){
		$answertype = ['trac-nghiem', 'dien-dap-an'];
		$answertype = $answertype[array_rand($answertype)];
	}

	$countType = ['dem-o-trong-khung', 'dem-o-con-thieu', 'dem-hinh-anh'];
	$countType = !empty($config['count_type']) ? $config['count_type'] : $countType[array_rand($countType)];
	
	if( $countType == 'dem-o-con-thieu' ){
		$max = ($max <= 10) ? $max : 9;
	}
	if( $countType == 'dem-hinh-anh' ){
		$img_data = DemSoTrongKhung10::getImageData()['data'];
		$img_rand = array_rand($img_data);
		$select_img = !empty($config['select_img']) ? $img_data[$config['select_img']] : $img_data[$img_rand];
		$max = ($max <= 10) ? $max : 10;
	}
	if( $max > 10 ){
		$answertype = 'dien-dap-an';
		$countType = 'dem-o-trong-khung';
	}
	$answer = rand($min, $max);
	// dd($answer);

	$shape = ['circle', 'pentagon', 'star', 'heptagon' ,'octagon'];
	$rand_shape = array_rand($shape);
?>
<div class="start">
	@if( empty($config['count_type']) )
		@if( $countType == 'dem-o-trong-khung' )
			Đếm số hình có trong khung
		@elseif( $countType == 'dem-o-con-thieu' )
			Đếm số ô trống trong khung dưới đây
		@else
			Có bao nhiêu {{ DemSoTrongKhung10::getImageData()['list'][$img_rand] }}?
		@endif
	@else
		{{ $question->title }}
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form '.$answertype, 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<div class="content form-group clearfix">
			@if( $countType == 'dem-hinh-anh' )
				@for($i = 1; $i <= $answer; $i++)
					<div class="pull-left" style="margin: 10px">
						<img src="{{ $select_img }}" width="70" class="pull-left" />
					</div>
					@if( $i == 5 ) <div class="clearfix"></div> @endif
				@endfor

			@else
				@for( $j = 1; $j <= floor($answer/10); $j++ )
					<table class="frame pull-left" style="margin: 10px">
						<tr>
							@for($i = 1; $i <= 5; $i++)
								<td style="border: 5px solid #bee8fb; padding: 10px">
									<div class="{{ $shape[$rand_shape] }}"></div>
								</td>
							@endfor
						</tr>
						<tr>
							@for($i = 6; $i <= 10; $i++)
								<td style="border: 5px solid #bee8fb; padding: 10px">
									<div class="{{ $shape[$rand_shape] }}"></div>
								</td>
							@endfor
						</tr>
					</table>
				@endfor

				@if( $answer % 10 > 0 )
					<table class="frame pull-left" style="margin: 10px">
						<tr>
							@for($i = 1; $i <= 5; $i++)
								<td style="border: 5px solid #bee8fb; padding: 10px">
									@if( $countType == 'dem-o-con-thieu' )
										<div class="{{ ($i <= (10 - $answer) % 10 ) ? $shape[$rand_shape] : 'unknown shape-none' }}"></div>
									@else
										<div class="{{ ($i <= $answer % 10 ) ? $shape[$rand_shape] : 'shape-none' }}"></div>
									@endif
								</td>
							@endfor
						</tr>
						<tr>
							@for($i = 6; $i <= 10; $i++)
								<td style="border: 5px solid #bee8fb; padding: 10px">
									@if( $countType == 'dem-o-con-thieu' )
										<div class="{{ ($i <= (10 - $answer) % 10 ) ? $shape[$rand_shape] : 'unknown shape-none' }}"></div>
									@else
										<div class="{{ ($i <= $answer % 10 ) ? $shape[$rand_shape] : 'shape-none' }}"></div>
									@endif
								</td>
							@endfor
						</tr>
					</table>

				@endif
			@endif
		</div>
		<div class="clearfix"></div>

		@if($answertype == 'dien-dap-an')
			<div class="form-group col-sm-2 input">
				{{ Form::number('answer', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		@else
			<table class="form-group choose" cellspacing="5" cellpadding="5">
				<tr>
					@for($i = 1; $i <= 5; $i++)
						<td>
							<input class="hidden" id="answer-{{ $question_num.$i }}" type="radio" name="answer" value="{{ $i }}"/>
							<label for="answer-{{ $question_num.$i }}">
								{{ $i }}
							</label>
						</td>
					@endfor
				</tr>
				<tr>
					@for($i = 6; $i <= 10; $i++)
						<td>
							<input class="hidden" id="answer-{{ $question_num.$i }}" type="radio" name="answer" value="{{ $i }}"/>
							<label for="answer-{{ $question_num.$i }}">
								{{ $i }}
							</label>
						</td>
					@endfor
				</tr>
			</table>
		@endif
	{{ Form::close() }}
</div>