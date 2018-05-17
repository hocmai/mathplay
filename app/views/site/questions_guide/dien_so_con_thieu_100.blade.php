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
		<p>Các số liên tiếp trong bảng số hơn kém nhau 1 đơn vị. </p>
		<p>Để tìm số còn thiếu ở ô trống, ta thực hiện cộng 1 đơn vị với số ở trước ô trống hoặc trừ 1 đơn vị với số ở sau ô trống</p>
		<p class="answers">Như vậy: số còn thiếu trong bảng là {{ json_encode($answer) }}</p>
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>