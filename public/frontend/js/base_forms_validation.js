/*
 *  Document   : base_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */
//Them kiem tra file tai len
$.validator.addMethod( "file", function( value, element, param ) {
    param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpeg|jpg|gif|doc|docx|pdf|xls|rar";
    return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
}, $.validator.format( "File tải lên là ảnh, docx, pdf, xls, rar" ) );

jQuery.validator.addMethod("maxSize", function(value, element, param){
    var file = $(element)[0].files[0];
    console.log(value);
    if(typeof file !== 'undefined' && file.size > param) {
        return false;
    }

    return true;
}, "Không quá 25MB");


//Thêm kiểm tra email
jQuery.validator.addMethod("email", function(value, element){
    var $reg = /^[a-zA-Z0-9][a-zA-Z0-9\._]{0,62}[a-zA-Z0-9]@[a-z0-9\-]{2,}(\.[a-z]{2,4}){1,2}$/;
    return this.optional(element) || $reg.test(value);
}, "Địa chỉ email không hợp lệ");

//Thêm kiểm tra links face / youtube
jQuery.validator.addMethod("links", function(value, element){
    var $reg = /^facebook.com\/\S{3,}|https:\/\/www.facebook.com\/\S{3,}|youtube.com\/\S{3,}|https:\/\/www.youtube.com\/\S{3,}/;
    return this.optional(element) || $reg.test(value);
}, "Link facebook hoặc youtube phải hợp lệ");
//Thêm kiểm tra phone
jQuery.validator.addMethod("phones", function(value, element){
    var $reg = /^01[0-9]{2}[0-9]{7}|0[0-9]{2}[0-9]{7}|0[0-9]{9}$/;
    return this.optional(element) || $reg.test(value);
}, "Số điện thoại không đúng, vui lòng nhập lại.");


var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function() {

    jQuery('body').find('.js-validation-bootstrap').each(function (index) {
        jQuery(this).validate({
            ignore: [],
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },

            highlight: function(e) {
                var elem = jQuery(e);

                elem.closest('.form-group').removeClass('has-error').addClass('has-error');
                elem.closest('.help-block').remove();
            },
            success: function(e) {
                var elem = jQuery(e);

                elem.closest('.form-group').removeClass('has-error');
                elem.closest('.help-block').remove();
            },
            rules: {
                'fullname': {
                    required: true,
                    number: false,
                    minlength: 1
                },
                'phone': {
                    required: true,
                    number: true,
                    phones: true,
                    minlength: 10,
                    maxlength: 11

                },
                'email': {
                    required: true,
                    email: true
                },
                'class': {
                    required: true
                }
            },
            messages: {
                'fullname': {
                    required: 'Họ và Tên không được trống',
                    number: 'Không được chứa số',
                    minlength: 'Ít nhất 1 ký tự'

                },
                'phone': {
                    required: 'Điện thoại không được trống',
                    number: 'Số điện thoại không đúng, vui lòng nhập lại.',
                    minlength: 'Số điện thoại không đúng, vui lòng nhập lại.',
                    maxlength: 'Số điện thoại không đúng, vui lòng nhập lại.'
                },
                'email': 'Nhập Email chính xác',
                'class': 'Chọn một lớp học!',
            }
        });
    });



    };


    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();


            // Init Validation on Select2 change
            jQuery('.js-select2').on('change', function(){
                jQuery(this).valid();
            });
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormValidation.init(); });
