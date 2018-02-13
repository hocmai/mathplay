<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<div class="form-group number-line-100">
			<div class="content">
				<ins>Đáp án đúng là:</ins>
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
	<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>