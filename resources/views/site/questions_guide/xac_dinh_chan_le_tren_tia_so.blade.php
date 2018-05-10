<div class="huong-dan-giai text-left" >
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
    	<p>* Nhớ<br>
			Số chẵn là số có chữ số tận cùng là 2, 4, 6, 8, hoặc 0.<br>
			Số lẻ là số có chữ số tận cùng là 1, 3, 5, 7, hoặc 9.
		</p>
		<p>*Giải<br>
			{{ ($type == 'even') ? 'Ở trên tia số, ta đi tìm các số có chữ số tận cùng là 0, 2, 4, 6, hoặc 8.': 'Ở trên tia số, ta đi tìm các số có chữ số tận cùng là 1, 3, 5, 7, hoặc 9. '}}
		</p>
    	<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					<div class="line inline-block" >
						@if( ($type == 'even' && $value%2 == 0) | ($type == 'odd' && $value%2 > 0) )
							{{ Form::checkbox('', $value, true )}}
						@else
							{{ Form::checkbox('', $value, false )}}
						@endif
						<label>
							{{ $value }}
						</label>
					</div>
				@endforeach
			</div>
		</div>
		<p class="answers">Như vậy, các số {{ ( $type =='even' ) ? 'chẵn':'lẻ' }} ở trên tia số trên là {{ implode(', ', $answer_arr) }}. </p> 
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>