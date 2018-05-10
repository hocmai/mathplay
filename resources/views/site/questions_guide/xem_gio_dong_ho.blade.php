<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $clock == 'analog' )
			<p>*Đồng hồ  kim có các số từ 1 đến 12 trên mặt đồng hồ, thường có 2 kim:</p>
			<p>-Kim ngắn (còn gọi là kim chỉ giờ hay kim giờ) chỉ số giờ.</p>
			<p>-Kim dài (còn gọi là kim chỉ phút hay kim phút) chỉ số phút.</p>
			<p>*Những chiếc kim này chuyển động cùng chiều kim đồng hồ.</p>
			<p>-Kim phút mất 5 phút để di chuyển từ một số đến số tiếp theo trên mặt đồng hồ. </p>
			<p>-Kim giờ mất 1 giờ để di chuyển giữa các số trên mặt đồng hồ</p>
			<div class="analog-clock inline-block">
				<div style="width: 250px; height: 250px; position: relative;">
					@include('site.common.analog-clock', ['hour' => (int)$time1[0], 'min' => (int)$time1[1] ])
				</div>
			</div><br>
			@if( $type == 'hour' )
				<p class="answers">Như vậy kim giờ chỉ {{ $answer }} giờ</p>
			@elseif($type == 'min')
				<p class="answers">Như vậy kim phút chỉ {{ $answer }} phút</p>
			@elseif( $type == 'choose-text' )
				<p class="answers">Đáp án đúng là: <b>{{ CommonQuestion::readHourMinute($time1[0], $time1[1]) }}</b></p>
			@else
				<p class="answers">Đáp án đúng là: <b>{{ $time1[0].' : '.$time1[1] }}</b></p>
			@endif
		@else
			<p class="answers">Đáp án đúng là: <b>{{ $time1[0].' : '.$time1[1] }}</b></p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>