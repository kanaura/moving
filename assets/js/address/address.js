/* javascriptのコードを記載 */

$(function() {
    let initPrefVal = '13';
    let initCityVal = '113';
    let valType = 'code';

    getPrefectureSelection('#select_prefecture_01', '#select_city_01', './assets/js/address/prefectureCityCode.json', valType, initPrefVal, initCityVal);

    $('#select_prefecture_01').on('change', function() {
        getCitySelection('#select_prefecture_01', '#select_city_01', './assets/js/address/prefectureCityCode.json', valType);
    });

    getPrefectureSelection('#select_prefecture_02', '#select_city_02', './assets/js/address/prefectureCityCode.json', valType, initPrefVal, initCityVal);

    $('#select_prefecture_02').on('change', function() {
        getCitySelection('#select_prefecture_02', '#select_city_02', './assets/js/address/prefectureCityCode.json', valType);
    });
});