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
            $('.confirm-select-content').show();
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
        }
        flow_step++;
        refresh_form();
    });

    $('.btn-back').on('click', function() {
        flow_step--;
        refresh_form();
    });
});