$(document).ready(function(){

    /////////////////////////// Keo tha net chu vao trong chu ky ///////////////////////////
    $('#GhepHinhThanhDay .item-source .item').draggable({
        revert: true,
        helper: "clone",
        revertDuration: 300,
    })

    $('#GhepHinhThanhDay .list-img .item.none').droppable({
        classes: {
            "ui-droppable-hover": "hover"
        },
        drop: function( e, ui ) {
            // console.log();
            var img = $(ui.draggable).html(),
            val = $(ui.draggable).attr('data-val');
            $(e.target).attr('data-val', val);
            $(e.target).empty().append(img);
        }
    });
    /////////////////

    //////////// Submit answer form
    $('#GhepHinhThanhDay .question-wrapper').on('submit', 'form.answer-question-form', function(e){
        var num = '';
        $(this).find('.list-img .item.none').each(function(index, el) {
            num += $(this).attr('data-val');
        });
        $(this).find('[name="answer"]').val(num);
    })
})