<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block {{ ( $key <= $position ) ? 'active'.( ($key < $position) ? ' first' : '' ) : '' }}">
						{{ ( $key < $position ) ? '<div class="sub">x '.($key+1).'</div>' : '' }}
						{{ $value }}
					</div>
				@endforeach
			</div>
		</div>
		<p>Đầu tiên, ta quan sát các mũi tên trên tia số. Điểm bắt đầu tại số {{ $lines[0] }}, điểm kết thúc tại số {{ $position*$plus }}. Vì thế, độ dài của mỗi mũi tên trên tia số là {{ $plus }} </p>
		<p>Có  {{ $position }} mũi tên giống nhau</p>
		<p>Mũi tên cuối cùng chỉ số {{ $position*$plus }}</p>
		<p class="answers">Như vậy, phép nhân được biểu diễn ở trên tia số là<b> {{ $position.' x '.$plus.' = '.$position*$plus }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
