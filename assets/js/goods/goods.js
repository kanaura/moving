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
        total = parseInt($('#total-base').val());

        $('.cnt').each(function(index) {
            count = parseInt($(this).val());
            if (count == 0) return;

            size = parseInt($(this).parent().find('.size').val());
            total += (size * count);
        });

        $('#total-cm3').val(total);

        total = total / 1000000;
        show_total = total.toFixed(1);
        $('#calc-total').text(show_total);
        $('#total-m3').val(show_total);
    }

    $('.dn').on('click', function() {
        num = parseInt($(this).parent().find('.num').text());
        if (num > 0) {
            num--;
        }
        $(this).parent().find('.num').text(num);
        $(this).parent().parent().find('.cnt').val(num);

        if ($(this).hasClass('good')) {
            refresh_total();
        }

        return false;
    });

    $('.up').on('click', function() {        
        num = parseInt($(this).parent().find('.num').text());
        if (num < 9) {
            num++;
        }

        total_cm3 = parseInt($('#total-cm3').val());
        sel_size = parseInt($(this).parent().parent().find('.size').val());
        calced_total = parseInt(total_cm3 + (sel_size * num));
        if ($(this).hasClass('good')) {
            if (calced_total > 23000000) {
                alert('OVER!');
                return false;
            }
        }

        $(this).parent().find('.num').text(num);
        $(this).parent().parent().find('.cnt').val(num);

        if ($(this).hasClass('good')) {
            refresh_total();
        }
        
        return false;
    });
});