/* javascriptのコードを記載 */

$(document).ready(function() {
    console.log( "ready!" );

    $('#btn-lead').on('click', function() {
        $('#popup').fadeIn(300);
    });

    $('#popup-bg').on('click', function() {
        $('#popup').hide();
    });

    /* 選択画面 */
    $('.select-list .select-item .select-item-head').on('click', function() {
        var list_top = $('#select-list-top').offset().top;
        console.log(list_top);

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this)
                .siblings('.select-item-body')
                .slideUp(200);
        } else {
            $('.select-list .select-item .select-item-head').removeClass('active');
            $(this).addClass('active');
            console.log('TEST01');
            $('.select-list .select-item .select-item-head').each(function (i, e) {
                if ($(this).hasClass('active')) {
                    list_top = list_top + ($(this).height() * (i));
                }
            });
            console.log('TEST02');
            $('html,body').animate({scrollTop: list_top }, 200);
            $('.select-list .select-item .select-item-body').slideUp(200);
            $(this)
                .siblings('.select-item-body')
                .slideDown(200);
        }
    });
});