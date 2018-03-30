<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if($sort == 'desc')
			<p>Theo yêu cầu của đề bài, ta thực hiện sắp xếp lần lượt các số từ lớn đến bé  theo chiều từ trái sang phải.</p>
		@else
			<p>Theo yêu cầu của đề bài, ta thực hiện sắp xếp lần lượt các số từ bé đến lớn  theo chiều từ trái sang phải.</p>
		@endif
		<p class="answers">Đáp án đúng: sắp xếp theo thứ tự {{ ($sort == 'desc') ? 'giảm dần' : 'tăng dần' }}</p><br>
		<div class="content inline-block sort-number text-center">
			@foreach($trueArr as $key => $value)
				<div class="item sort pull-left">{{ $value }}</div>
			@endforeach
		</div><hr>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>