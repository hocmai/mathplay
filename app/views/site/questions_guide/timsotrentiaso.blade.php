<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
			<input type="hidden" name="true_answer" value="{{ $answer }}" />
			<input type="hidden" name="qid" value="{{ $question->id }}" />
			<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
			<input type="hidden" name="question_number" value="{{ $question_num }}" />
			
			<div class="form-group number-line">
				<div class="content inline-block">
					@foreach($lines as $key => $value)
						@if( $type == 'input-total' )
							<div class="line inline-block {{ ( $key == $target | $key == $position ) ? 'active'.( $key == $target ? ' first' : '' ) : '' }}">
								{{ ( $key == $target ) ? '<div class="sub">+ '.$plus.'</div>' : '' }}
								{{ $value }}
							</div>
						@else
							<div class="line inline-block">
								{{ ( $value == $answer && $type == 'inline' ) ? Form::text('answer', $answer, ['class' => 'form-control padding0 text-center']) : $value }}
							</div>
						@endif
						
					@endforeach
				</div>
			</div>
		
			@if($type == 'input')
				<div class="form-group inline-block">
					<div class="col-sm-12">
						{{ Form::number('answer', '', ['class' => 'form-control', 'min' => 1]) }}
					</div>
				</div>
			@elseif($type == 'input-total')
				<div class="form-group inline-block" style="font-size:18px">
					{{ $lines[$target].' + '.$plus.' = '.Form::number('answer', '', ['class' => 'form-control', 'style' => 'width:80px;display:inline-block;font-size:18px', 'min' => 1]) }}
				</div>
			@endif
		{{ Form::close() }}
			<ins>Đáp án đúng là: {{ $answer }}</ins>
		<button class="btn lam-bai-tiep" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>