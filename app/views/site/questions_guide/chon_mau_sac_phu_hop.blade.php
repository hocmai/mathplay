<div class="huong-dan-giai text-left" style="display: block">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<p>- Đếm từ ô đầu tiên để tìm vị trí thứ {{ CommonQuestion::readNumber($position) }}</p>
		<div class="form-group find-color">
			<div class="content inline-block text-center">
				@foreach( $colors as $key => $value )
					<div class="color-item{{ ($key+1 == $position) ? ' active' : '' }}" style="background: {{ $value[1] }}"><span>thứ {{ ($key == 0) ? 'nhất' : CommonQuestion::readNumber($key+1) }}</span></div>
				@endforeach
			</div>
		</div>
		<p>Như vậy, Ô thứ {{ ($position == 0) ? 'nhất' : CommonQuestion::readNumber($position) }} có <b>{{ $answer_string }}</b></p>
		<p><ins>Đáp án đúng là: {{ $answer_string }}</ins></p>
	</div>
</div>