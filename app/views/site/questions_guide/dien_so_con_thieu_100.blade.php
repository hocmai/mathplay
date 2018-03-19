<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" >
		<div class="form-group number-line-100">
			<div class="content">
				<table border="1">
					@for($i = 0; $i < 10; $i++)
						<tr>
							@for($j = ($i*10)+1; $j <= ($i*10)+10; $j++)
								<td><div class="text">{{ in_array($j, $answer) ? Form::text('answer_'.$j,$j) : $j }}</div></td>
							@endfor
						</tr>
					@endfor
				</table>
			</div>
		</div>
		<p>Để xác định số còn thiếu trong bảng số 100. từ 1 đến 100 xem số nào còn thiếu thì điền vào ô trống</p>
		<p class="answers">Như vậy: số còn thiếu trong bảng là {{ json_encode($answer) }}</p>
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>