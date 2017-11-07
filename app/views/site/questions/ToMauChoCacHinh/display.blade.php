@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="1" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer">
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="canvas-wrapper">
					<div class="options inline-block">
						<label class="pull-left">Chọn màu: </label>
						<span class="pull-left active" style="background-color: #ff5500" data-color="#ff5500"></span>
						<span class="pull-left" style="background-color: #17bebb" data-color="#17bebb"></span>
						<span class="pull-left" style="background-color: #fbb423" data-color="#fbb423"></span>
						<span class="pull-left" style="background-color: #3F51B5" data-color="#3F51B5"></span>
					</div>
					<canvas width="750px" height="380px" class="draw-shape-color" id="draw-shape-color-{{ $question_num }}" style="max-width: 100%;"></canvas>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>