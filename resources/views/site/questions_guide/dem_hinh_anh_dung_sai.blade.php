<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<span> Đếm số {{$image_rand }}</span>
		<div class="clear clearfix"></div>
		<div class="radio">
            <input id="dungsai-answer-{{ $question_num }}1" type="radio" name="answer" value="{{ $answer }}" class="">
            <label for="dungsai-answer-{{ $question_num }}1">
                @for($i = 1; $i <= $answer; $i++)
	                <div class="inline-block">
	                    <img src="{{ !empty($images) ? $images[$image_rand] : '' }}" width="35px" style="margin: 0 5px" class="img-responsive pull-left" alt=""/>
	                    <span class="num"><b>{{ $i }}</b></span>
	                </div>
                @endfor
            </label>
        </div>
		<div class="clear clearfix"></div>
        <p class="answers">Có tổng cộng {{ $answer.' '.$image_rand }}</p>
	</div>
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
</div>