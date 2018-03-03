<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="content inline-block">
			<p>Quan sát, ta thấy có tất cả {{ $num.' '.$imageRand.' trong đó '.$sub.' '.$imageRand }} bị gạch chéo. </p>
			<div class="list-images form-group">
				@for($i = 1; $i <= $num; $i++)
					<div class="pull-left item {{ ($i>($num - $sub )) ? ' ignore del' : '' }}">
						<img width="50px" src="{{ asset($images[$imageRand]) }}">
						<span>{{ $i }}</span>
					</div>
				@endfor
			</div>
		</div>
		<p class="answers">Đáp án đúng là: {{ $num.' - '.$sub.' = '.($num - $sub) }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
