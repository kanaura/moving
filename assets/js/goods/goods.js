/* javascriptのコードを記載 */
$(function() {
    $('.select-size').on('click', function() {
        target = '#' + $(this).data('target');
        $(target).toggleClass('active');
        if ($(target).hasClass('active')) {
            $(target).slideDown();
        } else {
            $(target).slideUp();
        }

        return false;
    });

    $('.dn').on('click', function() {
        num = parseInt($(this).parent().find('.num').text());
        if (num > 0) {
            num--;
        }
        $(this).parent().find('.num').text(num);

        return false;
    });

    $('.up').on('click', function() {
        num = parseInt($(this).parent().find('.num').text());
        if (num < 10) {
            num++;
        }
        $(this).parent().find('.num').text(num);
        
        return false;
    });
});