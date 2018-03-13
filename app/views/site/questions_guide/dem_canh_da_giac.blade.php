<div class="huong-dan-giai text-left" style="display: block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="shapes {{ $answer }}">
			<svg class="shape" width="200" height="200">{{ DemCanhDaGiac::renderShape($answer) }}</svg>
		</div>
		<p class="answers">Đáp án đúng là: <b>{{ $num.' '. $answertype }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
