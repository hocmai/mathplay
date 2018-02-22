<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px;padding-top:50px">
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					@if( $type == 'input-total' )
						<div class="line inline-block {{ ( $key == $target | $key == $position ) ? 'active'.( $key == $target ? ' first' : '' ) : '' }}">
							{{ ( $key == $target ) ? '<div class="sub">+ '.$plus.'</div>' : '' }}
							{{ $value }}
						</div>
					@else
						<div class="line inline-block {{ ( $key == $position ) ? 'active' : '' }}">
							{{ ( $value == $answer && $type == 'inline' ) ? Form::text('answer', '', ['class' => 'form-control padding0 text-center']) : $value }}
						</div>
					@endif
					
				@endforeach
			</div>
		</div>
		<p>Khoảng cách giữa 2 số là: {{ $plus }}</p>
		@if($type == 'input-total')
			<p>{{ $lines[$position-1].' + '.$plus.' = '.$answer }}</p>
		@elseif($type == 'input')
			@if($target < $position)
				<p>Số bên phải {{ $lines[$position-1] }} là: {{  $lines[$position-1].' + '.$plus.' = '.$answer  }}</p>
			@elseif( $target > $position )
				<p>Số bên trái {{ $lines[$position+1] }} là: {{  $lines[$position+1].' - '.$plus.' = '.$answer  }}</p>
			@else
				<p>{{ 'Ở vị trí số '.($position + 1). ' là số: '.$answer }}</p>
			@endif
		@elseif($type == 'inline')
			@if($position == 0)
				<p>Số đầu tiên: {{ $lines[1].' - '.$plus. ' = '.$answer }}</p>
			@elseif($position == count($lines)-1)
				<p>Số cuối cùng: {{ $lines[$position-1].' + '.$plus. ' = '.$answer }}</p>
			@else
				<p>Số đằng trước: {{ $lines[$position-1].' + '.$plus.' = '.$answer }}</p>
				<p>Số đằng sau: {{ $lines[$position+1].' - '.$plus.' = '.$answer }}</p>
			@endif
		@endif
		<p class="answers"><ins>Đáp án đúng là:<b>{{ $answer }}</b></ins></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>