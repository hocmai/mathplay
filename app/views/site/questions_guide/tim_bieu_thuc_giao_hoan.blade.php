<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<p> Phép tính giao hoán là:</p>
		<p>a + b = b + a</p>
		<p>Một phép tính giao hoán cho phép ta thực hiện phép tính theo bất kỳ thứ tự nào. Do đó, khi cộng nhiều con số, ta có thể cộng theo bất kỳ thứ tự nào, số nào trước, số nào sau cũng được.</p>
		@if( $type == 'giao-hoan-2' )
			<p class="answers">Như vậy biểu thức giao hoán cần điền là:	{{ $answer_text }}</p>
		@elseif( $type == 'giao-hoan' )
			<p class="answers">Như vậy biểu thức giao hoán cần chọn là:	{{ $answer_text }}</p>
		@endif
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>