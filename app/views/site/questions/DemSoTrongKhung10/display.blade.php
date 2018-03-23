<?php
	$min = (!empty($config['min_value']) ) ? $config['min_value'] : 1;
	$max = (!empty($config['max_value']) ) ? $config['max_value'] : 100;
	$answertype = !empty($config['answer_type']) ? $config['answer_type'] : 'rand';
	if( $answertype == 'rand' ){
		$answertype = ['trac-nghiem', 'dien-dap-an'];
		$answertype = $answertype[array_rand($answertype)];
	}
	// dd( $answertype);
	$countType = !empty($config['count_type']) ? $config['count_type'] : getRandArrayVal(['dem-o-trong-khung', 'dem-o-con-thieu', 'dem-hinh-anh']);

	if( $countType == 'dem-o-con-thieu' ){
		$max = ($max <= 10) ? $max : 9;
		$min = ($min <= 10) ? $min : 1;
	}
	if( $countType == 'dem-hinh-anh' ){
		$img_data = CommonQuestion::getImgData('DemSoTrongKhung10');
		$img_rand = array_rand($img_data);
		$max = ($max <= 10) ? $max : 10;
		$min = ($min <= 10) ? $min : 1;
	}
	if( $max > 10 ){
		$answertype = 'dien-dap-an';
		$countType = 'dem-o-trong-khung';
	}
	$answer = rand($min, $max);
	// dd($answer);

	$shape = ['circle', 'pentagon', 'star', 'heptagon' ,'octagon'];
	$rand_shape = array_rand($shape);
	// dd($rand_shape);
?>


<?php $str_arr = [];
if( $countType == 'dem-o-trong-khung' ){
	$str_arr = ['Đếm số hình có trong khung'];
}
elseif( $countType == 'dem-o-con-thieu' ){
	$str_arr = ['Đếm số ô trống trong khung dưới đây'];
}
else{
	$str_arr = ['Có bao nhiêu', $img_rand];
}?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => $str_arr])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form '.$answertype, 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<div class="content form-group clearfix">
			@if( $countType == 'dem-hinh-anh' )
				@for($i = 1; $i <= $answer; $i++)
					<div class="pull-left item-img">
						<img src="{{ $img_data[$img_rand] }}" width="50" class="pull-left" />
					</div>
					@if( $i == 5 ) <div class="clearfix"></div> @endif
				@endfor

			@else
				{{ DemSoTrongKhung10::getTableHtml($answer, $countType, $shape[$rand_shape]) }}
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
@include('site.questions_guide.dem_otrongkhung10')
