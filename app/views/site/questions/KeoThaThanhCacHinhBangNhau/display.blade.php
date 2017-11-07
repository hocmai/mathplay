<?php 
$true_answer = '';
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value="" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="drag-icons drag-controls">
					<span class="odd item" data-val="0"></span>
					<span class="even item" data-val="1"></span>
				</div>
				<div class="clear clearfix"></div>
				@for($i = 0; $i < rand(2,3); $i++)
					<div class="answer-item inline-block">
						<?php
						$odd = rand(1,4); $even = rand(0,4); 
						$rand_blank = rand(1, $odd + $even);
						?>
						@for($j = 0; $j < 2; $j++)
							<div class="row-as drag-icons">
								@for($k = 1; $k <= $odd + $even; $k++)
									<?php if( $j == 1 && $k > ($odd + $even)-$rand_blank ){
										if( $k > $odd ){
											$true_answer .= '1';
										} else{
											$true_answer .= '0';
										}
									} ?>
									<div class="wrap{{ ($k > ($odd + $even)-$rand_blank && $j == 1) ? ' blank' : '' }}">
										@if( $k <= ($odd + $even)-$rand_blank | $j == 0 )
											<span class="item {{ ($k <= $odd) ? 'odd' : 'even' }}"></span>
										@endif
									</div>
								@endfor
							</div>
						@endfor
					</div>
				@endfor
				<input type="hidden" name="true_answer" value="{{ $true_answer }}" />
			</div>
		</div>
	{{ Form::close() }}
</div>