/* javascriptのコードを記載 */
var pref_id = [
    27,
];

var pref = [
    '大阪', 
];

var city = [
    [ '池田市', '泉大津市', '泉佐野市', '和泉市', '茨木市', '大阪狭山市', '大阪市旭区', '大阪市阿倍野区', '大阪市生野区', '大阪市北区', '大阪市此花区', '大阪市城東区', '大阪市住之江区', '大阪市住吉区', '大阪市大正区', '大阪市中央区', '大阪市鶴見区', '大阪市天王寺区', '大阪市浪速区', '大阪市西区', '大阪市西成区', '大阪市西淀川区', '大阪市東住吉区', '大阪市東成区', '大阪市東淀川区', '大阪市平野区', '大阪市福島区', '大阪市港区', '大阪市都島区', '大阪市淀川区', '貝塚市', '柏原市', '交野市', '門真市', '河内長野市', '岸和田市', '堺市北区', '堺市堺区', '堺市中区', '堺市西区', '堺市東区', '堺市南区', '堺市美原区', '四條畷市', '吹田市', '摂津市', '泉南郡熊取町', '泉南郡田尻町', '泉南郡岬町', '泉南市', '泉北市', '泉北郡忠岡市', '高石市', '高槻市', '大東市', '豊中市', '豊能郡豊能町', '豊能郡能勢町', '富田林市', '寝屋川市', '羽曳野市', '阪南市', '東大阪市', '枚方市', '藤井寺市', '松原市', '三島郡島本市', '南河内郡河南町', '南河内郡太子町', '南河内郡千早赤坂村', '箕面市', '守口市', '八尾市' ], 
];

$(function() {
    function process_target_city(pref_val, target) {
        idx = -1;
        for (i = 0; i < pref_id.length; i++) {
            if (pref_id[i] == pref_val) {
                idx = i;
                break;
            }
        }

        if (idx == -1) {
            return null;
        }

        $(target + ' option:nth-child(n+2)').remove();

        for (i = 0; i < city[idx].length; i++) {
            $(target).append('<option>' + city[idx][i] + '</option>');
        }

        return city[idx];
    }

    let initPrefVal = '13';
    let initCityVal = '113';
    let valType = 'code';

    getPrefectureSelection('#select_prefecture_01', '#select_city_01', './assets/js/address/prefectureCityCode.json', valType, initPrefVal, initCityVal);

    $('#select_prefecture_01').on('change', function() {
        ret = process_target_city($(this).val(), '#select_city_01');
        if (ret == null) {
            getCitySelection('#select_prefecture_01', '#select_city_01', './assets/js/address/prefectureCityCode.json', valType);
        }            
    });

    getPrefectureSelection('#select_prefecture_02', '#select_city_02', './assets/js/address/prefectureCityCode.json', valType, initPrefVal, initCityVal);

    $('#select_prefecture_02').on('change', function() {
        getCitySelection('#select_prefecture_02', '#select_city_02', './assets/js/address/prefectureCityCode.json', valType);
    });
});