/* javascriptのコードを記載 */
$(function() {
    $('.select-size').on('click', function() {
        $(this).toggleClass('active');

        target = '#' + $(this).data('target');
        $(target).toggleClass('active');
        if ($(target).hasClass('active')) {
            $(target).slideDown();
        } else {
            $(target).slideUp();
        }

        return false;
    });

    function refresh_total() {
        total = 0;
        $('.cnt').each(function(index) {
            count = $(this).val();
            if (count == 0) return;

            size = $(this).parent().find('.size').val();
            total += (size * count);
            console.log(size);
        });

        total = total / 1000000;
        show_total = total.toFixed(1);
        $('#calc-total').text(show_total);
    }

    $('.dn').on('click', function() {
        num = parseInt($(this).parent().find('.num').text());
        if (num > 0) {
            num--;
        }
        $(this).parent().find('.num').text(num);
        $(this).parent().parent().find('.cnt').val(num);

        refresh_total();

        return false;
    });

    $('.up').on('click', function() {
        num = parseInt($(this).parent().find('.num').text());
        if (num < 9) {
            num++;
        }
        $(this).parent().find('.num').text(num);
        $(this).parent().parent().find('.cnt').val(num);

        refresh_total();
        
        return false;
    });
});