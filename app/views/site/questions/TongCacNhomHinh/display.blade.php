<?php
$min_group = !empty($config['group_min']) ? $config['group_min'] : 2;
$max_group = !empty($config['group_max']) ? $config['group_max'] : 5;
$each_min = !empty($config['each_min']) ? $config['each_min'] : 2;
$each_max = !empty($config['each_max']) ? $config['each_max'] : 5;
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['count', 'nhan']);

$group = rand($min_group, $max_group);
$each = rand($each_min, $each_max);
$imagesData = CommonQuestion::getImgData('TongCacNhomHinh');
$imageShow = array_rand($imagesData);
// dd($imageShow);
$answer = $group.$each;

if( $type == 'nhan' | $type == 'phan-tich' ){
	$position = array_rand([0,1,2]);
	$answer = $group*$each;
	if( $position == 0 ){
		$answer = $group;
	}
	if( $position == 1 ){
		$answer = $each;
	}
}
if( $type == 'phan-tich' ){
	$answer = $group.$group;
}
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="question-content inline-block">
					@for ($i = 0; $i < $group; $i++)
						<div class="circle" style="transform: rotate({{ rand(0, 360) }}deg);">
							<div class="cont">
								@for ($j = 0; $j < $each; $j++)
									<span class="inline-block text-center"><img src="{{ asset($imagesData[$imageShow]) }}" width="45px" height="45px"></span>
								@endfor
							</div>
						</div>
					@endfor
					<div class="clear clearfix"></div>
					<br/>
					@if ($type == 'nhan')
						<p>
							{{ ($position == 0) ? Form::text('answer', '', ['class' => 'text-center form-control inline-block', 'style' => 'width: 50px']) : $group }} x 
							{{ ($position == 1) ? Form::text('answer', '', ['class' => 'text-center form-control inline-block', 'style' => 'width: 50px']) : $each }} = 
							{{ ($position == 2) ? Form::text('answer', '', ['class' => 'text-center form-control inline-block', 'style' => 'width: 50px']) : $group*$each }}
						</p>
					@elseif ($type == 'phan-tich')
						<div class="phan-tich text-left inline-block">
							<input type="hidden" name="answer" value="" />
							<p>Có {{ Form::text('answer_1', '', ['class' => 'text-center form-control inline-block', 'style' => 'width: 45px']) }} nhóm {{ $imageShow }}.</p>
							<p>
								@for( $i = 1; $i <= $group; $i++ )
									{{ $each.( ($i < $group) ? ' + ' : '' ) }}
								@endfor
								= {{ $each*$group }}
							</p>
							<p>
								{{ Form::text('answer_2', '', ['class' => 'text-center form-control inline-block', 'style' => 'width: 45px']) }}
								{{ ' x '.$each .' = '. $group*$each }}
							</p>
						</div>
					@else
						<input type="hidden" name="answer" value="" />
						<span class="inline-block text-left">
							<p>Có {{ Form::text('answer_1', '', ['class' => 'form-control inline-block', 'style' => 'width: 45px']) }} nhóm {{ $imageShow }}.</p>
							<p>Có {{ Form::text('answer_2', '', ['class' => 'form-control inline-block', 'style' => 'width: 45px']) }} {{ $imageShow }} trong mỗi nhóm</p>
						</span>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>