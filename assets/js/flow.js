/* javascriptのコードを記載 */
$price_goods = [
    [
        [ 20000, 30000, 30000 , 70000, 0, 0, 0 ], 
        [ 36000, 45455, 45455, 70000, 113636, 122727, 135000 ], 
        [ 40000, 50000, 50000, 74545, 118182, 127273, 140000 ], 
        [ 140000, 140000, 140000, 155000, 227273, 245455, 336364 ], 
    ], 
    [
        [ 30000, 40000, 45000, 70000, 0, 0, 0 ], 
        [ 45455, 45455, 55455, 70000, 113636, 122727, 144545 ], 
        [ 50000, 50000, 60000, 74545, 128182, 127273, 149091 ], 
        [ 140000, 140000, 140000, 155000, 227273, 245455, 336364 ], 
    ], 
    [
        [ 30000, 45000, 40000, 80000, 0, 0, 0 ], 
        [ 45455, 55455, 45455, 95455, 123636, 132727, 144545 ], 
        [ 50000, 60000, 50000, 100000, 128182, 136364, 149091 ], 
        [ 140000, 140000, 140000, 155000, 227273, 245455, 336364 ], 
    ], 
    [
        [ 70000, 70000, 70000, 100000, 0, 0, 0 ], 
        [ 70000, 70000, 95455, 145455, 168182, 122727, 254545 ], 
        [ 74545, 74545, 100000, 150000, 171818, 127273, 260000 ], 
        [ 155000, 155000, 155000, 155000, 0, 0, 0 ], 
    ], 
];

function get_area_idx($pref_id, $city_id) {
    $result = -1;
    if ($pref_id == 38) {
        if ($city_id == 1 || $city_id == 2 || $city_id == 3 || $city_id == 7 || $city_id == 14 || $city_id == 17) {
            $result = 0;
        } else if ($city_id == 0 || $city_id == 6 || $city_id == 11 || $city_id == 12 || $city_id == 15) {
            $result = 1;
        } else if ($city_id == 4 || $city_id == 5 || $city_id == 8 || $city_id == 9 || $city_id == 10 || $city_id == 13 || $city_id == 16 || $city_id == 18 || $city_id == 19) {
            $result = 2;
        }
    } else if ($pref_id == 37 || $pref_id == 36 || $pref_id == 39) {
        $result = 3;
    } else if ($pref_id == 34 || $pref_id == 33 || $pref_id == 35 || $pref_id == 31 || $pref_id == 32) {
        $result = 4;
    } else if ($pref_id == 27 || $pref_id == 26 || $pref_id == 28 || $pref_id == 25 || $pref_id == 29 || $pref_id == 30 || $pref_id == 24) {
        $result = 5;
    } else if ($pref_id == 40 || $pref_id == 41 || $pref_id == 42 || $pref_id == 43 || $pref_id == 44 || $pref_id == 45 || $pref_id == 46) {
        $result = 6;
    }
    return $result;
}

function get_truck_idx($total_cm3) {
    $result = -1;
    if ($total_cm3 < 5000000) {
        $result = 0;
    } else if ($total_cm3 < 10000000) {
        $result = 1;
    } else if ($total_cm3 < 16000000) {
        $result = 2;
    } else if ($total_cm3 < 16000000) {
        $result = 3;
    }

    return $result;
}

$(document).ready(function() {
    flow_step = 0;
    console.log(flow_step);

    refresh_form();

    function refresh_form() {
        $('body, html').animate({
            scrollTop: 0
        }, 0);
        
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

        if (flow_step == 5) {
            // お見積り金額
            $('.btn-clear').hide();

            $('.price-select-content').show();
            $('.btn-default').text('この内容で仮申込をする');
        } else {
            $('.price-select-content').hide();
        }

        if (flow_step == 6) {
            // 最後の画面
            $('.btn-clear').hide();

            $('.final-content').show();
            $('.btn-default').text('この内容で仮申込をする');
        } else {
            $('.final-content').hide();
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

            p1 = $('select#select_prefecture_01 option:selected').val();
            c1 = $('select#select_city_01 option:selected').val();
            $area_01_id = get_area_idx(p1, c1);
            p2 = $('select#select_prefecture_02 option:selected').val();
            c2 = $('select#select_city_02 option:selected').val();
            $area_02_id = get_area_idx(p2, c2);

            console.log($area_01_id);
            if (!($area_01_id >= 0 && $area_01_id <= 3)) {
                window.location.href = './exception.php';
                return false;
            }

            console.log($area_02_id);
            if (!($area_02_id >= 0 && $area_02_id <= 6)) {
                window.location.href = './exception.php';
                return false;
            }
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

            $('input.free-cnt').each(function(index) {
                var cnt = parseInt($(this).val());
                if (cnt != 0) {
                    var free_ttl = $(this).parent().parent().parent().find('.input-free-name').val()
                    var size_01 = parseInt($(this).parent().parent().find('.input-free-w').val());
                    var size_02 = parseInt($(this).parent().parent().find('.input-free-h').val());
                    var size_03 = parseInt($(this).parent().parent().find('.input-free-d').val());

                    tbl_content += '<tr>';
                    tbl_content += '<td class="lng">' + free_ttl + '(横幅' + size_01 + 'cm・奥行' + size_02 + 'cm・高さ' + size_03 + 'cm)</td>';
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

            if ($('#option_special_recycle').val() == 1) {
                tbl_content += '<tr>';
                tbl_content += '<td class="lng">リサイクル処分</td>';
                tbl_content += '<td class="sht">別途お見積り</td>';
                tbl_content += '</tr>';
            }

            if ($('#option_special_useless').val() == 1) {
                tbl_content += '<tr>';
                tbl_content += '<td class="lng">不用品回収</td>';
                tbl_content += '<td class="sht">別途お見積り</td>';
                tbl_content += '</tr>';
            }

            if ($('#select-elevator-01').val() == 0) {
                $floor_price = $('#select-floor-01').val();
                $floor = $('#select-floor-01')[0].selectedIndex + 3;
                if ($floor_price != 0) {
                    tbl_content += '<tr>';
                    tbl_content += '<td class="lng">【4階以上作業】引越し元</td>';
                    tbl_content += '<td class="sht">' + $floor + '階</td>';
                    tbl_content += '</tr>';         
                }
            }

            if ($('#select-elevator-02').val() == 0) {
                $floor_price = $('#select-floor-02').val();
                $floor = $('#select-floor-02')[0].selectedIndex + 3;
                if ($floor_price != 0) {
                    tbl_content += '<tr>';
                    tbl_content += '<td class="lng">【4階以上作業】引越し先</td>';
                    tbl_content += '<td class="sht">' + $floor + '階</td>';
                    tbl_content += '</tr>';         
                }
            }

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
            var time_str = $('input[name=time]:checked').val();
            if (time_str == undefined || time_str == null || time_str == '') {
                alert('お引越しの時間帯を選択してください！');
                return;
            }
            dt_str = dt_str + ((time_str == 'am') ? '午前' : '午後');
            $('#select-info-date').text(dt_str);

            var message = $('textarea[name=message]').val();
            $('textarea[name=message_confirm]').val(message);
        } else if (flow_step == 4) {
            p1 = $('select#select_prefecture_01 option:selected').val();
            c1 = $('select#select_city_01 option:selected').val();
            $area_01_id = get_area_idx(p1, c1);
            p2 = $('select#select_prefecture_02 option:selected').val();
            c2 = $('select#select_city_02 option:selected').val();
            $area_02_id = get_area_idx(p2, c2);

            $truck_id = get_truck_idx($('input[name=total_cm3]').val());

            $moving_date = $('input[name=date]').val();
            $md_items = $moving_date.split("-");
            $moving_date_val = parseInt($md_items[1]) * 100 + parseInt($md_items[2]);

            $price_good = $price_goods[$area_01_id][$truck_id][$area_02_id];

            if ($moving_date_val >= 315 && $moving_date_val <= 415) {
                $price_good = parseInt($price_good * 1.5);
            }

            $price_option = 0;
            $('input.option-cnt').each(function(index) {
                $cnt = $(this).val();
                $price = $(this).parent().find('.price').val();
                if ($cnt != 0) {
                    $price_option += ($price * $cnt);
                }
            });

            if ($('#select-elevator-01').val() == 0) {
                $floor_price = parseInt($('#select-floor-01').val());
                if ($floor_price != 0) {
                    $price_option += $floor_price;
                }
            }

            if ($('#select-elevator-02').val() == 0) {
                $floor_price = parseInt($('#select-floor-02').val());
                if ($floor_price != 0) {
                    $price_option += $floor_price;
                }
            }

            $price_tax = parseInt(($price_good + $price_option) * 0.1);

            $price_total = $price_good + $price_option + $price_tax;

            $('#price_total_head').text(new Intl.NumberFormat('en-US').format($price_total));

            $('#price_good').text(new Intl.NumberFormat('en-US').format($price_good));
            $('input[name=price_good]').val(new Intl.NumberFormat('en-US').format($price_good));
            $('#price_option').text(new Intl.NumberFormat('en-US').format($price_option));
            $('input[name=price_option]').val(new Intl.NumberFormat('en-US').format($price_option));
            $('#price_tax').text(new Intl.NumberFormat('en-US').format($price_tax));
            $('input[name=price_tax]').val(new Intl.NumberFormat('en-US').format($price_tax));
            $('#price_total').text(new Intl.NumberFormat('en-US').format($price_total));
            $('input[name=price_total]').val(new Intl.NumberFormat('en-US').format($price_total));
        } else if (flow_step == 5) {
            if (!$('#chk-agree').is(':checked')) {
                alert('「同意します」をチェックしてください。');
                return false;
            }
        } else if (flow_step == 6) {
            $('#form-mail-send').submit();
            return false;
        }

        flow_step++;
        refresh_form();
    });

    $('.btn-back').on('click', function() {
        flow_step--;
        refresh_form();
    });

    $('.select-elevator').on('change', function() {
        $exist = $(this).val();
        if ($exist == "1") {
            $(this).parent().parent().next().hide();
        } else {
            $(this).parent().parent().next().show();
            $(this).parent().parent().next().find('select')[0].selectedIndex = 0;
        }
    });
});