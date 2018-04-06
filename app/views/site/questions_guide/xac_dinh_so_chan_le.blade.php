<div class="huong-dan-giai text-left" style="display: block;">
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
    	@if($type == 'coin')
    	<div class="content inline-block">
    		<p>Nhóm 2 {{ $imageRand }} thành 1 cặp. Có tổng cộng {{($numRand%2 == 0) ? $numRand/2 : floor($numRand/2) }} nhóm. {{ ($numRand%2 == 0) ? '':' Còn lại 1 '.$imageRand.' không được xếp vào nhóm nào.' }}</p>
    		<p>Vậy số lượng {{ $imageRand }} là số {{ ($numRand%2 == 0) ? 'Chẵn' : 'Lẻ'}}.</p>
			<div class="image-show">
				@for($i = 1; $i <= floor($numRand/2); $i++)
					<div class="inline-block text-center" style="border-right: 1px solid #000;padding:2px">
						<img src="{{ asset($imageData[$imageRand]) }}" width="30" />
					</div>
				@endfor
				<div class="clear clear fix"></div>
				@for($i = floor($numRand/2)+1; $i <= $numRand; $i++)
					<div class="inline-block text-center" style="border-right: 1px solid #000;padding:2px">
						<img src="{{ asset($imageData[$imageRand]) }}" width="30" />
					</div>
				@endfor
			</div>
		</div>
		@else
		<p>* Nhớ<br>
			Số chẵn là số có chữ số tận cùng là 2, 4, 6, 8, hoặc 0. <br>
			Số lẻ là số có chữ số tận cùng là 1, 3, 5, 7, hoặc 9.
		</p>
		<p>*Giải</p>
		<p>{{ $numRand }} có chữ số tận cùng là số {{ $numRand%10 }}. Như vậy {{ $numRand }} là số {{ ($numRand%2 == 0) ? 'Chẵn' : 'Lẻ'}} </p>
		@endif
		<div class="clear clear-fix"></div> 
		<p class="answers">Đáp án đúng là: {{ ($numRand%2 == 0) ? 'Chẵn' : 'Lẻ'}}</p>
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>