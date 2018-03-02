<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Đếm theo nhóm {{ $start }} đơn vị. Theo dõi bảng sau:</p>
		<div class="form-group find-number-table">
			<div class="content inline-block">
				<table border="1" bgcolor="#5673c1" class="text-center">
					<tr><th>Số {{ $nameRand }}</th><th>Số {{ $name[$nameRand] }}</th></tr>
					@for( $i = 1; $i <= $max; $i++ )
						<tr>
							<?php $num = $start*$i; ?>
							<td><div class="text">{{ $i }}</div></td>
							<td><div class="text">{{ ($answer == $num) ? Form::text('answer', $answer) : $num }}</div></td>
						</tr>
					@endfor
				</table>
			</div>
		</div>
		<p class="answers">Như vậy có tổng cộng {{ $answer.' '.$name[$nameRand].' ở '.($position).' '.$nameRand }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>