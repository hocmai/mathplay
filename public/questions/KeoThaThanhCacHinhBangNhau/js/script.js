$(document).ready(function(){

    /////////////////////////// Keo tha net chu vao trong chu ky ///////////////////////////
    $('#KeoThaThanhCacHinhBangNhau .drag-icons .item').draggable({
        revert: true,
        helper: "clone",
        revertDuration: 300,
    })

    $('#KeoThaThanhCacHinhBangNhau .row-as .wrap.blank').droppable({
        classes: {
            "ui-droppable-hover": "hover"
        },
        drop: function( e, ui ) {
            var img = $(ui.draggable).clone();
            $(e.target).empty().append(img);
        }
    });
    $('#KeoThaThanhCacHinhBangNhau .row-as .wrap.blank ').on('click', '.item', function(){
        $(this).hide('300', function() {
            $(this).remove();
        });
    });
    /////////////////

    //////////// Submit answer form
    $('#KeoThaThanhCacHinhBangNhau .question-wrapper').on('submit', 'form.answer-question-form', function(e){
        var num = '';
        $(this).find('.row-as .wrap.blank>.item').each(function(index, el) {
            num += $(this).attr('data-val');
        });
        $(this).find('[name="answer"]').val(num).change();
        return false;
    })
})