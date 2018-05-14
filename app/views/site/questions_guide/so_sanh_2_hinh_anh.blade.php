<?php
$sosanh = 'bằng';
if($answer_range[0] > $answer_range[1] && $num1 > $num2){
	$sosanh = 'nhiều hơn';
}elseif($answer_range[0] < $answer_range[1] && $num1 < $num2) {
	$sosanh = 'ít hơn';
}
 ?>
<div class="huong-dan-giai text-left" style="display: block;" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" >
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
			<p class="answers">Đáp án đúng là: 
				{{ $answer_range[0].' '.$image_rand[0].' '.$sosanh.' '. $answer_range[1].' '.$image_rand[1]  }}</p>
		@elseif($type == 'select')
	        <p class="answers">Đáp án đúng là: Có <b> {{ $answer_range[0].' '.$image_rand[0] }}</b></p>
	    @else
	        <p class="answers">Đáp án đúng là: Có <b> {{ $answer_range[0].' '.$image_rand[0] }}</b></p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
