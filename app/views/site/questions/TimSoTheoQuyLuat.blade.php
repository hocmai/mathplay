<?php
$name = ['Tòa nhà' => 'tầng', 'Chậu cây' => 'cây', 'Giỏ' => 'quả táo', 'Bàn' => 'chiếc bút', 'Kệ sách' => 'quyển sách', 'Cây' => 'chiếc lá'];
$nameRand = array_rand($name);
$max = rand(3,6);
$start = rand(1,5);
$position = rand(2,$max);
$answer = $start*$position;
?>

<div class="start">
	{{ 'Mỗi '.$nameRand.' có '.$start.' '.$name[$nameRand].'. Hỏi '.($position).' '.$nameRand.' có bao nhiêu '.$name[$nameRand] }}?
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group find-number-table">
			<div class="content inline-block">
				<table border="1" bgcolor="#5673c1" class="text-center">
					<tr><th>Số {{ $nameRand }}</th><th>Số {{ $name[$nameRand] }}</th></tr>
					@for( $i = 1; $i <= $max; $i++ )
						<tr>
							<?php $num = $start*$i; ?>
							<td><div class="text">{{ $i }}</div></td>
							<td><div class="text">{{ ($answer == $num) ? Form::text('answer', '') : $num }}</div></td>
						</tr>
					@endfor
				</table>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>