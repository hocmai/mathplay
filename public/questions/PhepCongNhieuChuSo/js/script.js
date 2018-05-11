$(document).ready(function($) {

	$('#PhepCongNhieuChuSo input[type="text"]').on('input, change', function(){
		$(this).setCaret(0);
	})

});