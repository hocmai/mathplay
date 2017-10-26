$(document).ready(function(){

	// window.setTimeout(function(){

		$('#PhepCongTru2ChuSo .multi-input-number input[type="text"]').on('keypress', function(event){
			
		});
		$('#PhepCongTru2ChuSo .multi-input-number input[type="text"]').on('keyup', function(e){
			if(event.keyCode < 48 | event.keyCode > 57){
	           event.preventDefault(); //stop character from entering input
	           return; 
   			}
			var val = $(this).val(event.key).change();
			if( $(this).parent().find('>input[type="text"]').length == 2 ){
				if( $(this).index() == 0 ){
					$(this).parent().find('>input[type="text"]:eq(1)').focus();
				} else{
					$(this).parent().find('>input[type="text"]:eq(0)').focus();
				}
			}
			if( $(this).parent().find('>input[type="text"]').length < 2 | (e.keyCode != 37 && e.keyCode != 39) | e.keyCode == 13 ){
				return;
			}
			if( $(this).index() == 0 ){
				$(this).parent().find('>input[type="text"]:eq(1)').focus();
			} else{
				$(this).parent().find('>input[type="text"]:eq(0)').focus();
			}
		});
		$(document).on('change', '#PhepCongTru2ChuSo .multi-input-number input[type="text"]', function(event){
			console.log( $(this).val() );
			if( $(this).val() == '' ){
				if( $(this).parent().find('>input[type="text"]').length == 2 ){	
					if( $(this).index() == 0 ){
						$(this).parent().find('>input[type="text"]:eq(1)').focus();
					} else{
						$(this).parent().find('>input[type="text"]:eq(0)').focus();
					}
				}
			}
			
			var num1 = $(this).parent().find('>input[type="text"]:eq(0)').val();
			var num2 = ($(this).parent().find('>input[type="text"]').length == 2) ? $(this).parent().find('>input[type="text"]:eq(1)').val() : '';
			$(this).parents('form').find('input[name="answer"]').val(num1+num2).change();
		})

	// }, 300)

}());