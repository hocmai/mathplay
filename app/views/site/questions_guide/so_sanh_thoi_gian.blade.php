<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>{{ $name.' '.$works[0].' lúc: '.$time1[0].':'.$time1[1] }} </p>
		<p>{{ $name.' '.$works[1].' lúc: '.$time2[0].':'.$time2[1] }} </p>
		<p>Vậy {{ $name.' sẽ '.(($answer == 1) ? $works[0] : $works[1]).' '.$do_this }}</p>
		<p class="answers">Đáp án đúng là:<b> {{ ($answer == 1) ? $works[0] : $works[1] }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>