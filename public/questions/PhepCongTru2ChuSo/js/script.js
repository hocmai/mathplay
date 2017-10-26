$(document).ready(function(){

	// window.setTimeout(function(){

		$('#PhepCongTru2ChuSo .multi-input-number input[type="text"]').on('keypress', function(event){
			
		});
		$('#PhepCongTru2ChuSo .multi-input-number input[type="text"]').on('keyup', function(e){
			if( $(this).parent().find('>input[type="text"]').length < 2 | (e.keyCode != 37 && e.keyCode != 39) | e.keyCode == 13 ){
				return;
			}
			if( $(this).index() == 0 ){
				$(this).parent().find('>input[type="text"]:eq(1)').focus();
			} else{
				$(this).parent().find('>input[type="text"]:eq(0)').focus();
			}
		});

		/////////// nhap tu ban phim
		$('#PhepCongTru2ChuSo .multi-input-number input[type="text"]').on('change', function(event){
			var val = $(this).val();
			console.log( $(this).val(), val.substring(val.length-1, val.length) );

			if( $(this).val() == '' && $(this).parent().find('>input[type="text"]').length == 2 ){	
				if( $(this).index() == 0 ){
					$(this).parent().find('>input[type="text"]:eq(1)').focus();
				} else{
					$(this).parent().find('>input[type="text"]:eq(0)').focus();
				}
			}
			var num1 = $(this).parent().find('>input[type="text"]:eq(0)').val();
			var num2 = ($(this).parent().find('>input[type="text"]').length == 2) ? $(this).parent().find('>input[type="text"]:eq(1)').val() : '';
			$(this).parents('form').find('input[name="answer"]').val(num1+num2).change();
		})

		////////// nhap tu ban phim ao
		// $(document).on('input', '#PhepCongTru2ChuSo .multi-input-number input[type="text"]', function(event){
		// 	var val = $(this).val();
		// 	console.log( $(this).val(), val.substring(val.length-1, val.length) );
		// 	$(this).val( val.substring(val.length-1, val.length) ).change();

		// 	if( $(this).val() == '' ){
		// 		if( $(this).parent().find('>input[type="text"]').length == 2 ){	
		// 			if( $(this).index() == 0 ){
		// 				$(this).parent().find('>input[type="text"]:eq(1)').focus();
		// 			} else{
		// 				$(this).parent().find('>input[type="text"]:eq(0)').focus();
		// 			}
		// 		}
		// 	}
		// })

	// }, 300)

}());