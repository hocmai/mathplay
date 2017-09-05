$(document).ready(function(){
	$('.missing-addition-sentence .item>input').on('input', function(){
		$(this).val( $(this).val().replace(/[^\+\=[0-9]/g, "") );
	})
})