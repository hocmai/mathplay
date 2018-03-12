<div class="huong-dan-giai text-left" >
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
    	@if($type == 'coin')
    	<div class="content inline-block">
    		<p>Hai hình ảnh gom lại thành một nhóm</p>
			<div class="image-show">
				@for($i = 1; $i <= floor($numRand/2); $i++)
					<div class="inline-block text-center" style="border-right: 1px solid #000;padding:2px">
						<img src="{{ $imageRand }}" width="30" />
					</div>
				@endfor
				<div class="clear clear fix"></div>
				@for($i = floor($numRand/2)+1; $i <= $numRand; $i++)
					<div class="inline-block text-center" style="border-right: 1px solid #000;padding:2px">
						<img src="{{ $imageRand }}" width="30" />
					</div>
				@endfor
			</div>
		</div>
		@else
		<p>*nhớ</p>
		<p>	-Số chẵn là số có chữ số tận cùng là 2, 4, 6, 8, hoặc 0.</p>
		<p>	-Số lẻ là số có chữ số tận cùng là 1, 3, 5, 7, hoặc 9</p>
		@endif
		<p class="answers">Đáp án đúng là: {{ ($numRand%2 == 0) ? 'Chẵn' : 'Lẻ'}}</p>
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>