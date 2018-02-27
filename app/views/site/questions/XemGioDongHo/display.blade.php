<?php
$hour = array('01','02','03','04','05','06','07','08','09','10','11','12');
$minute = array('00','05','10','15','20','25','30','35','40','45','50','55');

$time1 = [getRandArrayVal($hour), getRandArrayVal($minute)];
$time2 = [getRandArrayVal($hour), getRandArrayVal($minute)];
$_arr = [$time1, $time2]; shuffle($_arr);

$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['hour','min','choose-number','choose-text','choose-img']);
$clock = !empty($config['clock']) ? $config['clock'] : getRandArrayVal(['analog','digital']);

$answer = $time1[0].':'.$time1[1];
if( $type == 'hour' ){
	$answer = (int)$time1[0];
}
if( $type == 'min' ){
	$answer = (int)$time1[1];
}
?>

@include('site.questions.render-title', ['question' => $question])

<div class="description">
	@if( $type == 'hour' )
		Kim giờ đang chỉ số mấy (không chứa số 0 ở đầu)
	@elseif( $type == 'min' )
		Kim phút đang chỉ số mấy (không chứa số 0 ở đầu)
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if( $clock == 'analog' )
					<div class="analog-clock inline-block">
						<div style="width: 250px; height: 250px; position: relative;">
							@include('site.common.analog-clock', ['hour' => (int)$time1[0], 'min' => (int)$time1[1] ])
						</div>
					</div>
				@else
					<div class="digital-clock">
						@include('site.common.digital-clock', ['hour' => $time1[0], 'min' => $time1[1] ])
					</div>
				@endif

				<div class="clearfix"></div>

				@if( $type == 'hour' )
					<div class="form-group inline-block">
						{{ Form::text('answer', '', ['class'=>'form-control text-center pull-left', 'style'=>'width:55px']) }}<span class="pull-left" style="line-height: 35px; font-size: 16px; font-weight: 500; margin-left: 5px"> : {{ $time1[1] }}</span>
					</div>
				@elseif( $type == 'min' )
					<div class="form-group inline-block">
						<span class="pull-left" style="line-height: 35px; font-size: 16px; font-weight: 500; margin-right: 5px">{{ $time1[0] }} : </span>{{ Form::text('answer', '', ['class'=>'form-control text-center', 'style'=>'width:55px']) }}
					</div>
				@elseif( $type == 'choose-number' )
					<div class="radio-box radio form-group">
						{{ Form::radio('answer', $_arr[0][0].':'.$_arr[0][1], false, ['id' => $question_num.'-1' ]) }}
						<label for="{{ $question_num.'-1' }}">{{ $_arr[0][0].':'.$_arr[0][1] }}</label>
					</div>
					<div class="radio-box radio form-group">
						{{ Form::radio('answer', $_arr[1][0].':'.$_arr[1][1], false, ['id'=>$question_num.'-2' ]) }}
						<label for="{{ $question_num.'-2' }}">{{ $_arr[1][0].':'.$_arr[1][1] }}</label>
					</div>
				@elseif( $type == 'choose-img' )
					@if( $clock == 'analog' )
						<?php $rand_clock = rand(1,3); ?>
						<div class="radio-box radio form-group">
							{{ Form::radio('answer', $_arr[0][0].':'.$_arr[0][1], false, ['id' => $question_num.'-1' ]) }}
							<label for="{{ $question_num.'-1' }}" style="background-color: #eee;">
								<div class="digital-clock inline-block" style="">
									@include('site.common.digital-clock', ['hour' => (int)$_arr[0][0], 'min' => (int)$_arr[0][1], 'num' => $rand_clock ])
								</div>
							</label>
						</div>
						<div class="radio-box radio form-group">
							{{ Form::radio('answer', $_arr[1][0].':'.$_arr[1][1], false, ['id'=>$question_num.'-2' ]) }}
							<label for="{{ $question_num.'-2' }}" style="background-color: #eee;">
								<div class="digital-clock inline-block" style="">
									@include('site.common.digital-clock', ['hour' => (int)$_arr[1][0], 'min' => (int)$_arr[1][1], 'num' => $rand_clock ])
								</div>
							</label>
						</div>
					@else
						<div class="radio-box radio form-group">
							{{ Form::radio('answer', $_arr[0][0].':'.$_arr[0][1], false, ['id' => $question_num.'-1' ]) }}
							<label for="{{ $question_num.'-1' }}" style="width: 180px;background-color: #eee">
								<div class="analog-clock inline-block">
									<div style="position: relative;">
										@include('site.common.analog-clock', ['hour' => (int)$_arr[0][0], 'min' => (int)$_arr[0][1] ])
									</div>
								</div>
							</label>
						</div>
						<div class="radio-box radio form-group">
							{{ Form::radio('answer', $_arr[1][0].':'.$_arr[1][1], false, ['id'=>$question_num.'-2' ]) }}
							<label for="{{ $question_num.'-2' }}" style="width: 180px;background-color: #eee">
								<div class="analog-clock inline-block">
									<div style="position: relative;">
										@include('site.common.analog-clock', ['hour' => (int)$_arr[1][0], 'min' => (int)$_arr[1][1] ])
									</div>
								</div>
							</label>
						</div>
						
					@endif
				@else
					<!-- Choose text -->
					<div class="radio-box radio form-group">
						{{ Form::radio('answer', $_arr[0][0].':'.$_arr[0][1], false, ['id' => $question_num.'-1' ]) }}
						<label for="{{ $question_num.'-1' }}">{{ CommonQuestion::readHourMinute($_arr[0][0], $_arr[0][1]) }}</label>
					</div>
					<div class="radio-box radio form-group">
						{{ Form::radio('answer', $_arr[1][0].':'.$_arr[1][1], false, ['id'=>$question_num.'-2' ]) }}
						<label for="{{ $question_num.'-2' }}">{{ CommonQuestion::readHourMinute($_arr[1][0], $_arr[1][1]) }}</label>
					</div>
				@endif
				
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.xem_gio_dong_ho')