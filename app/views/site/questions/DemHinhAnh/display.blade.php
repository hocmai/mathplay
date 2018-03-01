<?php 
$num = !empty($config['num']) ? $config['num'] : rand(3,6);
$max = !empty($config['max']) ? $config['max'] : rand(1,5);

$imageData = CommonQuestion::getImgData('DemHinhAnh');
$imageRange = array_rand($imageData, $num);
$imageShow = [];
$imageCount = [];
// dd($imageData, $imageRange);

foreach ($imageRange as $key) {
	$numItem = rand(1, $max);
	$imageCount[] = ['img' => $key, 'num' => $numItem];
	for ($i = 1; $i <= $numItem; $i++) { 
		$imageShow[] = [
			'count' => '<span class="count '.( ($i == $numItem) ? 'fa fa-star' : '' ).'">'. $i . '</span>',
			'url' => $imageData[$key],
			'margin' => 'margin: '. rand(0,30) .'px '. rand(0,30) .'px'
		];
	}
}
// shuffle($imageShow);
// dd($imageShow);
$answer = $imageCount[0]['img']."-".$imageCount[0]['num']."-".$imageCount[0]['img']."-".$imageCount[0]['num'];
?>
@include('site.questions.render-title', ['question' => $question, 'desc' => "Có bao nhiêu ".$imageCount[0]['img']." và ".$imageCount[1]['img'] ])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{$answer}}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="image-show-area">
					@foreach ($imageShow as $key => $img)
						<div class="img pull-left" style="{{ $img['margin'] }}">
							<img src="{{ asset($img['url']) }}" width="50px;">
						</div>
					@endforeach
				</div>
				<div class="clear clearfix"></div>
				
				<?php $rand = rand(0,1);/// Set random radio ?>
				@for ($i = 0; $i < 2; $i++)
					<div class="form-group radio radio-box">
						{{ Form::radio('answer', ( $rand == $i ) ? 'false' : $answer, false, ['id' => 'num-show-'.$question_num.$i]) }}
						<label for="{{ 'num-show-'.$question_num.$i }}">

							<table class="table table-bordered margin0">
								@for ($j = 0; $j < 2; $j++)
									<tr>
										<td><img src="{{ asset($imageData[$imageCount[$j]['img']]) }}" width="40px"></td>
										<td><span class="count1">{{ ( $rand == $i ) ? $imageCount[$j]['num'] + getRandArrayVal([rand(1,$max)]+range(-$imageCount[$j]['num'], -1)) : $imageCount[$j]['num'] }}</span></td>
									</tr>
								@endfor
							</table>
						</label>
					</div>
				@endfor
				
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.dem_hinhanh')

