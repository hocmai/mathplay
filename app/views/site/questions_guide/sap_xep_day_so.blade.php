<div class="huong-dan-giai text-left" style="display:block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p class="answers">Đáp án đúng: sắp xếp theo thứ tự {{ ($sort == 'desc') ? 'giảm dần' : 'tăng dần' }}</p><br>
		<div class="content inline-block sort-number text-center">
			@foreach($trueArr as $key => $value)
				<div class="item sort pull-left">{{ $value }}</div>
			@endforeach
		</div><hr>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>