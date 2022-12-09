/* javascriptのコードを記載 */
$(document).ready(function() {
    flow_step = 0;
    console.log(flow_step);

    refresh_form();

    function refresh_form() {
        if (flow_step == 0) {
            // 住所の選択
            $('.main-figure').show();
            $('.address-lead').show();
            $('.address-content').show();

            $('.btn-back').hide();
            $('.btn-clear').hide();
            $('.btn-default').text('家財の内容を入力する');
        } else {
            $('.main-figure').hide();
            $('.address-lead').hide();
            $('.address-content').hide();

            $('.btn-back').show();
            $('.btn-clear').show();
        }

        if (flow_step > 0 && flow_step < 4) {
            $('#select-content-head').show();
        } else {
            $('#select-content-head').hide();
        }

        if (flow_step == 1) {
            // 家財の選択
            $('.good-select-content').show();
            $('.btn-default').text('オプションの選択');
            $('.btn-clear').addClass('good');
        } else {
            $('.good-select-content').hide();
            $('.btn-clear').removeClass('good');
        }

        if (flow_step == 2) {
            // オプションの選択
            $('.option-select-content').show();
            $('.btn-default').text('お引越要望日の選択');
        } else {
            $('.option-select-content').hide();
        }

        if (flow_step == 3) {
            // お引越要望日の選択
            $('.date-select-content').show();
            $('.btn-default').text('入力内容を確認');
        } else {
            $('.date-select-content').hide();
        }

        if (flow_step == 4) {
            // 入力内容の確認
            $('.btn-clear').hide();

            $('.confirm-select-content').show();
            $('.btn-default').text('お見積り');
        } else {
            $('.confirm-select-content').hide();
        }
    }

    $('.btn-default').on('click', function() {
        if (flow_step == 0) {
            p1 = $('select#select_prefecture_01 option:selected').text();
            c1 = $('select#select_city_01 option:selected').text();
            $('#confirm-addr-current').text(p1 + ' ' + c1);
            p2 = $('select#select_prefecture_02 option:selected').text();
            c2 = $('select#select_city_02 option:selected').text();
            $('#confirm-addr-target').text(p2 + ' ' + c2);
        } else if (flow_step == 1) {
            $('#confirm-good-table').empty();

            var tbl_content = '';
            $('input.goods-ttl').each(function(index) {
                var cnt = parseInt($(this).parent().find('.cnt').val());
                if (cnt != 0) {
                    tbl_content += '<tr>';
                    tbl_content += '<td class="lng">' + $(this).val() + '</td>';
                    tbl_content += '<td class="sht">' + cnt + '台</td>';
                    tbl_content += '</tr>';
                }
            });

            $('input.free-ttl').each(function(index) {
                var cnt = parseInt($(this).parent().find('.cnt').val());
                var size_01 = parseInt($(this).parent().parent().find('.input-free-w').val());
                var size_02 = parseInt($(this).parent().parent().find('.input-free-h').val());
                var size_03 = parseInt($(this).parent().parent().find('.input-free-d').val());
                if (cnt != 0) {
                    tbl_content += '<tr>';
                    tbl_content += '<td class="lng">' + $(this).val() + '(' + size_01 + 'cm・' + size_02 + 'cm・' + size_03 + 'cm)</td>';
                    tbl_content += '<td class="sht">' + cnt + '台</td>';
                    tbl_content += '</tr>';
                }
            });

            if (tbl_content == '') {
                alert('家財を選択してください！');
                return;
            }

            $('#confirm-good-table').html(tbl_content);
        } else if (flow_step == 2) {
            $('#confirm-option-table').empty();

            var tbl_content = '';
            $('input.option-ttl').each(function(index) {
                var cnt = parseInt($(this).parent().find('.cnt').val());
                if (cnt != 0) {
                    tbl_content += '<tr>';
                    tbl_content += '<td class="lng">' + $(this).val() + '</td>';
                    tbl_content += '<td class="sht">' + cnt + '台</td>';
                    tbl_content += '</tr>';
                }
            });

            $('#confirm-option-table').html(tbl_content);
        } else if (flow_step == 3) {
            var date_str = $('input[name=date]').val();
            if (date_str == '') {
                alert('お引越しの予定日を選択してください！');
                return;
            }

            var date_str_y = date_str.substring(0, 4);
            var date_str_m = date_str.substring(5, 7);
            var date_str_d = date_str.substring(8, 10);
            dt_str = date_str_y + '年 ' + date_str_m + '月 ' + date_str_d + '日 ';
            var time_str = $('input[name=time]').val();
            dt_str = dt_str + ((time_str == 'am') ? '午前' : '午後');
            $('#select-info-date').text(dt_str);

            var message = $('textarea[name=message]').val();
            $('textarea[name=message_confirm]').val(message);
        } else if (flow_step == 4) {
            console.log(flow_step);
        }

        flow_step++;
        refresh_form();
    });

    $('.btn-back').on('click', function() {
        flow_step--;
        refresh_form();
    });
});