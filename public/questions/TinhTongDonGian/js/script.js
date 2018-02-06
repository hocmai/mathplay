$(document).ready(function($) {

	$('#TinhTongDonGian .tong.doc input').on('input, change', function(){
		$(this).setCaret(0);
	})

});