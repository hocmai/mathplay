<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		{{-- // phep chia 2 hinh anh --}}
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
			{{-- moi quan he giua phep nhan va phep chia --}}
		@elseif($type == 'nhan-chia')
			<p>* Mối quan hệ giữa phép nhân và phép chia.<br>
				Cả phép nhân và phép chia đều được biểu diễn bởi một hình. Do đó, các số hạng trong biểu thức nhân và biểu thức chia trong trường hợp này là giống nhau hay phép nhân và phép chia là 2 phép tính ngược nhau.
			</p>
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
			<p>-Hình trên có tất cả {{ $group }} nhóm, mỗi nhóm {{ $each }} {{ $imageShow }}.</p>
			<p>{{ $group.' x '.$each.' = '.($group*$each) }}</p>
			<p>{{ ($group*$each).' : '.$group.' = '.$answer }}</p>
			<p class="answers"> Như vậy số cần điền là : {{ $answer }}</p>
			{{-- phep chia 2 so chia het --}}
		@else
			<p>Theo bảng chia {{ $a }} ta có</p>
			<div class=" inline-block text-center chia-2-so" style="border:2px solid #eee">
				@for ($x = 1; $x <= 12; $x++)
					<p class="{{ ($x == $b) ? 'text_item' : 'item' }}">{{ ($x*$a).' : '.$a.' = '.(($x*$a)/$a) }}</p>
				@endfor
			</div>
			<div class="clear clear-fix"></div>
			<p class="answers">Vậy số cần điền vào ô trống là: {{ $b }}</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
