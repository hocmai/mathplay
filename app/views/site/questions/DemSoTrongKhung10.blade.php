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
		$max = 9;
	}
	if( $countType == 'dem-hinh-anh' ){
		$img_data = DemSoTrongKhung10::getImageData()['data'];
		$select_img = !empty($config['select_img']) ? $img_data[$config['select_img']] : $img_data[array_rand($img_data)];
		$max = 10;
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
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form '.$answertype, 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ ($countType == 'dem-o-trong-khung' | $countType == 'dem-hinh-anh') ? $answer : 10 - $answer }}" />
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
								<div class="{{ ($i <= $answer % 10 ) ? $shape[$rand_shape] : (($countType == 'dem-o-con-thieu') ? 'unknown ' : '').'shape-none' }}"></div>
							</td>
						@endfor
					</tr>
					<tr>
						@for($i = 6; $i <= 10; $i++)
							<td style="border: 5px solid #bee8fb; padding: 10px">
								<div class="{{ ($i <= $answer % 10 ) ? $shape[$rand_shape] : (($countType == 'dem-o-con-thieu') ? 'unknown ' : '').'shape-none' }}"></div>
							</td>
						@endfor
					</tr>
				</table>

			@endif
				<style type="text/css">
					.unknown.shape-none::before{content: "?";line-height: 50px;font-size: 35px;font-weight: 600;color: #ddd;}
					.shape-none{width: 50px; height: 50px;}
					.circle{border-radius: 100%; background: #8CC713}
					.star{
						-webkit-clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
					    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
					    background: #ffca19;
					}
					.pentagon{
						-webkit-clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
						clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
					    background: yellow;
					}
					.heptagon{
						-webkit-clip-path: polygon(50% 0%, 90% 20%, 100% 60%, 75% 100%, 25% 100%, 0% 60%, 10% 20%);
						clip-path: polygon(50% 0%, 90% 20%, 100% 60%, 75% 100%, 25% 100%, 0% 60%, 10% 20%);
					    background: red;
					}
					.octagon{
						-webkit-clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
						clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
					    background: orange;
					}
				</style>
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

		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>

<style type="text/css">
	td > div{
	    width: 50px;
	    height: 50px;
	}
	.question-wrapper .choose td>label{
		width: 64px;
	    height: 64px;
	    text-align: center;
	    line-height: 45px;
	    margin: 5px;
	    font-size: 30px;
	    background: #6a8bf3;
	}
	.question-wrapper .choose td>input:checked + label,
	.question-wrapper .choose td>label:hover{
		background: #32437c;
	}
</style>