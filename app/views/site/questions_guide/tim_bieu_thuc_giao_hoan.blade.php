<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p>Khi thực hiện phép cộng nhiều số hạng, ta có thể đổi chỗ các số hạng với nhau mà tổng không thay đổi.</p>
		@if( $type == 'giao-hoan-2' )
			<p class="answers">Như vậy biểu thức giao hoán cần điền là:	{{ $answer_text }}</p>
		@elseif( $type == 'giao-hoan' )
			<p class="answers">Như vậy biểu thức giao hoán cần chọn là:	{{ $answer_text }}</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>