<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<p>Đếm theo nhóm 10 đơn vị</p>
		<div class="form-group row img-area">
			@for($i = 1; $i <= $answer; $i++)
				<div class="col-xs-4 col-sm-3 item" style="margin: 15px 0">
					<img src="{{ $image }}" width="125">
					<span class="{{ ($i == $answer) ? 'last' : '' }}">{{ $i*10 }}</span>
				</div>
			@endfor
		</div>
		<p class="answers">Đáp án đúng là: <b>{{ $answer*10 }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>