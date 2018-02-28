<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if($answertype == 'single')
			<p>Để nhận diện các hình cho trước, quan sát các cạnh, các đỉnh và các góc của hình đó.</p>

			<p class="answers">Đáp án đúng: {{ $shapes[$answer] }}</p>
		@elseif($answertype == 'multi')
			<p class="answers">Đáp án đúng: {{ $shapes[$answer] }}</p><br>
			{{ NhanDienCacHinh::renderShape($answer) }}
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>