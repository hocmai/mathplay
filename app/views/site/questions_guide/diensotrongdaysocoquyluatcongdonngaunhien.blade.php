<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
			<input type="hidden" name="true_answer" value="{{ $answer }}" />
			<input type="hidden" name="qid" value="{{ $question->id }}" />
			<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
			<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
			<div class="form-group find-number-in-list">
				<div class="content inline-block">
					@for( $i = 1; $i <= $num_col; $i++ )
						<div class="pull-left number">{{ ($answer == $start+( $plus*($i-1) )) ? Form::text('answer', $answer) : $start+( $plus*($i-1) ) }}{{ ($i < $num_col) ? ', ' : '' }}</div>
					@endfor
				</div>
			</div>
		{{ Form::close() }}
		<ins>Đáp án đúng là: {{ $answer }}</ins>
		<button class="btn lam-bai-tiep" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>