<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>{{ $num.' = '.(floor($num/10)).' chục '.' + '.($num-(floor($num/10)*10)).' đơn vị' }}</p>
		<p>{{ ' = '.(floor($num/10)-1).' chục '.' + '.(($num-(floor($num/10)*10))+10).' đơn vị' }}</p>
		@if($num >=20)
			<p>{{ ' = '.(floor($num/10)-2).' chục '.' + '.(($num-(floor($num/10)*10))+20).' đơn vị' }}</p>
			<p>{{ ' = '.(floor($num/10)-3).' chục '.' + '.(($num-(floor($num/10)*10))+30).' đơn vị' }}</p>
		@else
		@endif
		<p class="answers">đáp án đúng là:<b> {{ (floor($num/10) > 1 ) ? (floor($num/10)-1).' chục cộng '.( $num - ((floor($num/10)-1)*10) ).' đơn vị' : floor($num/10).' chục cộng '.($num-(floor($num/10)*10)).' đơn vị' }}</b></p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>