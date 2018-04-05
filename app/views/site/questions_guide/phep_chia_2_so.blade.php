<div class="huong-dan-giai text-left" style="display: block;">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if($type == 'chia_img')
			<p>-Hình trên có tất cả {{ $group }} nhóm, mỗi nhóm {{ $each }} {{ $imageShow }}.</p>
			<div class="question-content">
				@for ($i = 0; $i < $group; $i++)
					<div class="inline-block text-center">
						<div class="circle" style="transform: rotate({{ rand(0, 360) }}deg);">
							<div class="cont">
								@for ($j = 0; $j < $each; $j++)
									<span class="inline-block text-center"><img src="{{ asset($imagesData[$imageShow]) }}" width="30px" height="30px"></span>
									{{-- <span><b>{{ $j+1 }}</b></span> --}}
								@endfor
							</div>
						</div>
						<span class="count">{{ $i+1 }}</span>
					</div>
				@endfor
			</div>
			<p>-Quan sát thấy {{ $each.' '.$imageShow.' trong mỗi nhóm.' }}</p>
			<p class="answers">Phép chia được biểu diễn bởi hình đã cho là: {{ ($group*$each).' : '.$group.' = '.$each }}</p>
		@else
			<p>Ta có thể trả lời câu hỏi này nhờ các mối liên hệ về số đã biết:</p>
			<div class=" inline-block text-right" style="border:2px solid #eee">
				@for ($x = 1; $x <= 10; $x++)
					<p class=" item">{{ ($x*$a).' : '.$a.' = '.(($x*$a)/$a) }}</p>
				@endfor
			</div>
			<div class="clear clear-fix"></div>
			<p class="answers">Như vậy: {{ ($a*$b).' : '.$a.' = '.$b}}</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
