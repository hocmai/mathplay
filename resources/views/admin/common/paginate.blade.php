<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		{{ $input->appends(request()->except('page'))->links() }}
		</ul>
	</div>
</div>
