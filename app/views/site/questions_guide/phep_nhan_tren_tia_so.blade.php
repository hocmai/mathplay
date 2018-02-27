<div class="huong-dan-giai text-left" >
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
		<p>-Có tất cả {{ ($position) }} mũi tên, đếm từ điểm xuất phát về bên phải {{ ($position) }} đơn vị .</p>
		<p>-Độ dài của mỗi khoảng cách trên tia số là {{ $plus }}</p>
		<p class="answers">Như vậy, phép nhân được biểu diễn ở trên tia số là<b> {{ $position.' x '.$plus.' = '.$position*$plus }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>