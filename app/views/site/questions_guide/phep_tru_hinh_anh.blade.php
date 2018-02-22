<div class="huong-dan-giai text-left" style="display:block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="images form-group clearfix">
			@for($i = 1; $i <= $num1; $i++)
				<div class="item pull-left{{ ($i>($num1 - $num2)) ? ' ignore' : '' }}">
					<img src="{{ asset($randImg) }}" width="30" />
					<span>{{ $i }}</span>
				</div>
			@endfor
		</div>
		<p class="answers">Đáp án đúng: {{ $answer }} </p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>