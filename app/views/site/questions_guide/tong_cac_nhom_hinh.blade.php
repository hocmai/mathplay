<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
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
		@if($type == 'nhan')
			<p>-Có tất cả {{ $group }} nhóm, mỗi nhóm {{ $each }} {{ $imageShow }}.</p>
			<p class="answers">Viết biểu thức nhân biểu diễn {{ $group.' x '.$each.' = '.($group*$each) }}</p>
		@elseif($type == 'phan-tich')
			<p>-Có <b>{{ $group }}</b> nhóm<b> {{ $imageShow }}</b></p>
			<p class="answers">Đáp án {{ $group.' x '.$each.' = '.($group*$each) }}</p>
		@else
			<p>-Có {{ $group }} Nhóm {{ $imageShow }}</p>
			<p>-Có {{ $each }} {{ $imageShow }} trong mỗi nhóm</p>

		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>