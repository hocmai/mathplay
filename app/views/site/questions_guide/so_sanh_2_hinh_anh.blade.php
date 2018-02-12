<?php
$sosanh = 'bằng';
if($answer_range[0] > $answer_range[1]){
	$sosanh = 'lớn hơn';
}elseif($answer_range[0] < $answer_range[1]) {
	$sosanh = 'bé hơn';
}


 ?>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<span class> Đếm số {{ $image_rand[0] }}:</span>
		<div class="hinh">
            @for($i = 1; $i <= $answer_range[0]; $i++)
            	<div class="inline-block text-center">
	                <img src="{{ !empty($images) ? $images[$image_rand[0]] : '' }}" class="img-responsive mauto" width="45px" alt=""/>
					<strong>{{ $i }}</strong>   
				</div>         
            @endfor
        </div>
        @if( $type != 'select' )
	        <span>Có {{ $answer_range[0].' '.$image_rand[0] }}</span>
	        <hr>
	        <span> Đếm số {{ $image_rand[1] }}:</span>
			<div class="hinh">
	            @for($i = 1; $i <= $answer_range[1]; $i++)
	                <div class="inline-block text-center">
		                <img src="{{ !empty($images) ? $images[$image_rand[1]] : '' }}" class="img-responsive mauto" width="45px" alt=""/>
						<strong>{{ $i }}</strong>   
					</div>          
	            @endfor
	       	</div>
	       	<span>Có {{ $answer_range[1].' '.$image_rand[1] }}</span>
			<br>

			<ins>Đáp án đúng là:</ins>
			<span>{{  $answer_range[0].' '.$image_rand[0].' '.$sosanh.' '. $answer_range[1].' '.$image_rand[1]}}</span>
		@else
	        <span><ins>Đáp án đúng là:</ins> Có {{ $answer_range[0].' '.$image_rand[0] }}</span>
		@endif
		
		<button class="btn lam-bai-tiep" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
