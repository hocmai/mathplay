<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if($type == 'input')
		<p>Bắt đầu từ số {{ $nums[1] }} đếm ngược {{ $answer }} đơn vị kết quả nhận được là {{ $nums[0] }}</p>
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block {{ ( $value >= $nums[0] && $value <= $nums[1] ) ? 'active'.( $value == $nums[0] ? ' first' : '' ).( $value == $nums[1] ? ' last' : '' ) : '' }}">
						{{ ( $value >= $nums[0] && $value < $nums[1] ) ? '<div class="sub">- '.$plus.'</div>' : '' }}
						{{ $value }}
					</div>
				@endforeach
				<hr>
				<p>Nên: {{ $nums[1].' - '.$answer.' = '.$nums[0] }}</p>
			</div>
		</div>
		@elseif($type == 'choose')
			<p>Bắt đầu từ số {{ $nums[1] }} đếm ngược {{ $nums[0] }}  kết quả nhận được là {{ $answer }}</p>
			<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block {{ ( $value >= $nums[0] && $value <= $nums[1] ) ? 'active'.( $value == $nums[0] ? ' first' : '' ).( $value == $nums[1] ? ' last' : '' ) : '' }}">
						{{ ( $value >= $nums[0] && $value < $nums[1] ) ? '<div class="sub">- '.$plus.'</div>' : '' }}
						{{ $value }}
					</div>
				@endforeach
			</div>
		</div>
		@endif

		<p class="answers">Đáp án : {{ $answer }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>