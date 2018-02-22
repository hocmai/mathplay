<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<div class="image-show-area">
			@foreach ($imageShow as $key => $img)
				<div class="img pull-left" style="{{ $img['margin'] }}">
					<img src="{{ asset($img['url']) }}" width="50px;">
					{{ $img['count'] }}
				</div>
			@endforeach
		</div>
		<br>
		<p class="answers"><ins>Đáp án đúng là:</ins></p>
		<table class="table table-bordered margin0">
			@for( $i = 0; $i < 2; $i++ )
				<tr>
					<td><img src="{{ asset($imageData[$imageCount[$i]['img']]) }}" width="40px"></td>
					<td><span class="count1">{{ $imageCount[$i]['num'] }}</span></td>
				</tr>
			@endfor
		</table>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
