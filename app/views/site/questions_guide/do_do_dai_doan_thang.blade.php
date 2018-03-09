<div class="huong-dan-giai text-left" >
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="content">
			<p>*Nhớ:</p>
			<p>Các bước sử dụng thước kẻ đo độ dài đoạn thẳng:</p>
			<p>-Đặt thước kẻ dọc theo đoạn thẳng, vạch số 0 trùng với một đầu đoạn thẳng</p>
			<p>-Nhìn vào vạch gần nhất với đầu kia của đoạn thẳng. Đó chính là số đo chiều dài của đoạn thẳng.</p>
			<p>-Trên mặt thước kẻ, đều có vạch chia độ dài. Khi đo một vật, ta biết được chiều dài của vật bằng cách đọc số đo trên vạch chia.</br>
			-Luôn luôn quan sát thật cẩn thận các vạch để chắc chắn đơn vị mà mỗi vạch thể hiện.</p>
			<div class="work-area inline-block form-group">
				<div class="line-wrapper"><span class="line" style="width: {{ $length*10  }}%"></span></div>
				<div class="sort-area">
					<span class="ruller"><img src="{{ asset('questions/DoDoDaiDoanThang/img/wood-ruler.png') }}"></span>
				</div>
			</div>
			<div class="clearfix"></div>
			<p>Giải:</p>
			<p>-Đặt thước kẻ dọc theo đoạn thẳng, vạch số 0 trùng với một đầu đoạn thẳng.<br>
			-Nhìn vào vạch gần nhất với đầu kia của đoạn thẳng chỉ số <b>{{ $length }}</b>. Đó chính là số đo chiều dài của đoạn thẳng.</p>
			<p class="answers">kết luận: Đoạn thẳng trên dài <b>{{ $length }}</b> cm</p>		
		</div>	
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>