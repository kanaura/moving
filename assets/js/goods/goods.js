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

        $('#calc-total-confirm').text(show_total);
        $('#calc-total-confirm-02').text(show_total);
        
        if (total <= 5) {
            total_percent = (total / 5) * 25;
            $('#select-head-bar-list-bg').width(total_percent + "%");
            $('#select-head-bar-list-bg').css({'background' : 'rgba(0, 255, 255, 1.0)'});
        } else if (total <= 10) {
            total_percent = ((total - 5) / 5) * 25 + 25;
            $('#select-head-bar-list-bg').width(total_percent + "%");
            $('#select-head-bar-list-bg').css({'background' : 'rgba(217, 224, 33, 1.0)'});
        } else if (total <= 16) {
            total_percent = ((total - 10) / 6) * 25 + 50;
            $('#select-head-bar-list-bg').width(total_percent + "%");
            $('#select-head-bar-list-bg').css({'background' : 'rgba(251, 176, 59, 1.0)'});
        } else if (total <= 23) {
            total_percent = ((total - 20) / 3) * 25 + 75;
            $('#select-head-bar-list-bg').width(total_percent + "%");
            $('#select-head-bar-list-bg').css({'background' : 'rgba(255, 123, 172, 1.0)'});
        } else {
            $('#select-head-bar-list-bg').width("100%");
            $('#select-head-bar-list-bg').css({'background' : '#ff0000'});
        }
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
        if (num < 10) {
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

    function clear_all() {
        if (flow_step == 1) {
            $('.good-select-content .item-ctrl.num').each(function(index) {
                $(this).val(0);
                $(this).parent().find('.cnt').val(0);
            });

            $('.good-select-content .input-free').each(function(index) {
                $(this).val(0);
            });

            $('.good-select-content .input-free-name').each(function(index) {
                $(this).val('');
            });
        } else if (flow_step == 2) {
            $('.option-select-content .item-ctrl.num').each(function(index) {
                $(this).val(0);
                $(this).parent().find('.cnt').val(0);

                $('#option_special_recycle')[0].selectedIndex = 0;
                $('#option_special_useless')[0].selectedIndex = 0;

                $('#select-elevator-01')[0].selectedIndex = 0;
                $('#select-floor-01')[0].selectedIndex = 0;
                $('#select-elevator-02')[0].selectedIndex = 0;
                $('#select-floor-02')[0].selectedIndex = 0;
                
                $('.block-select-floor').each(function() {
                    $(this).show();
                });
            });
        }

        return;
    }

    $('.btn-clear').on('click', function() {
        clear_all();

        if ($(this).hasClass('good')) {
            refresh_total();
        }

        return false;
    });
    
    $('.standalone-icon').on('click', function() {
        clear_all();

        $('.item-ctrl.num.single').each(function(index) {
            cnt = 1;
            if ($(this).hasClass('single-129')) {
                cnt = 5;
            }
            $(this).val(cnt);
            $(this).parent().find('.cnt').val(cnt);
        });

        refresh_total();

        alert('単身楽チョイスが選択されました');

        return false;
    });

    $('select.item-ctrl').on('change', function() {
        console.log($(this)[0].selectedIndex);

        num = $(this)[0].selectedIndex;
        
        var cnt_item = $(this).parent().find('.cnt');
        cnt_item.val(num);
        if (cnt_item.hasClass('free')) {
            free_w = parseInt($(this).parent().parent().find('.input-free-w').val());
            free_h = parseInt($(this).parent().parent().find('.input-free-h').val());
            free_d = parseInt($(this).parent().parent().find('.input-free-d').val());
            free_size = free_w * free_h * free_d;
            if (free_size === null || isNaN(free_size)) {
                free_size = 0;
            }
            $(this).parent().find('.size').val(free_size);
        }

        if ($(this).hasClass('good')) {
            refresh_total();
        }
    });

    $('.input-free').on('mouseup keyup', function(e) {
        // var value = parseInt($(this).val());
        // var valueMax = parseInt($(this).attr('max'));
        // var valueMin = parseInt($(this).attr('min'));
        // if(value > valueMax){ $(this).val(valueMax); }
        // if(value < valueMin){ $(this).val(valueMin); }
        // if(isNaN(value)){ $(this).val(0); }

        free_w = parseInt($(this).parent().parent().find('.input-free-w').val());
        free_h = parseInt($(this).parent().parent().find('.input-free-h').val());
        free_d = parseInt($(this).parent().parent().find('.input-free-d').val());
        free_size = free_w * free_h * free_d;
        console.log(free_size);
        if (free_size === null || isNaN(free_size)) {
            free_size = 0;
        }

        $(this).parent().parent().find('.size').val(free_size);
        refresh_total();
    });
});