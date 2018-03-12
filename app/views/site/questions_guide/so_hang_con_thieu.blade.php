<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="tong pull-left">{{ Form::number('answer', '', ['style' => 'width: 50px;text-align: center;']) }} + {{ $answer1 }} = {{ $answer1 + $answer2 }}
		</div>
		<br>
		<br>
		<p>-Phép cộng với phép trừ đối lập nhau</p>
		<p>-Để tìm số còn thiếu vào ô trống, thực hiện phép trừ: {{ ($answer1+$answer2).' - '.$answer1.' = '.$answer2 }}</p>
		<p class="answers">Đáp án đúng là: {{ $answer2 }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>