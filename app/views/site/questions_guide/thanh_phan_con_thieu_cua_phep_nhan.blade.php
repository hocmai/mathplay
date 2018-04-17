<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>* Nhớ<br>
			-Dạng toán điền số còn thiều thường cho ta biết hai số trong một phép tính và để trống số thứ ba. Để thực hiện dạng toán này, ta cần nhớ phép nhân và phép chia là hai phép tính ngược nhau
		</p>
		<p>*Giải</p>
		<p>Để biết</p>
		<div class="content inline-block">
			@if( $a > $b )
				<div class="nhan pull-left" >{{'?'.' x '.$a }} = {{ $a*$b }}</div>
			@else
				<div class="nhan pull-left" >{{ $a.' x '.'?' }}  = {{ $a*$b }}</div>
			@endif
		</div>
		<p>Ta lấy</p>
		<p>{{ $a*$b.' : '.$a.' = '.'....' }}</p>
		<p>Thực hiện phép chia {{ ($a*$b).' cho '.$a }}</p>
		<p>{{ $a*$b.' : '.$a.' = '.$answer }}</p>
		<p class="answers">Như vậy số còn thiếu là: {{ $answer }}</p>
	</div>
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
</div>
