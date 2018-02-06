$(document).ready(function($) {

	$('#PhepNhanNhieuChuSo input[type="text"]').on('input, change', function(){
		$(this).setCaret(0);
	})

});