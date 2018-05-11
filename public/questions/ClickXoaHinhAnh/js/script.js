$(document).ready(function(){
	$('#ClickXoaHinhAnh .list-images > .item').on('click', function(){
		$(this).toggleClass('del');
		var num_active = $(this).parents('.list-images').find('>.item:not(.del)').length;
		$(this).parents('form').find('input[type="hidden"][name="answer"]').val(num_active).change();
	})
})