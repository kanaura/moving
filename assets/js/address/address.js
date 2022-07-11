/* javascriptのコードを記載 */
var pref_id = [
    27, 26, 28, 25, 29, 30, 24, 
    38, 37, 36, 39, 
    34, 33, 35, 31, 32, 
    40, 41, 42, 43, 44, 45, 46
];

var pref = [
    '大阪', '京都', '兵庫', '滋賀', '奈良', '和歌山', '三重', 
    '愛媛', '香川', '徳島', '高知', 
    '広島', '岡山', '山口', '鳥取', '島根', 
    '福岡', '佐賀', '長崎', '熊本', '大分', '宮崎', '鹿児島'
];

var city = [
    [ '池田市', '泉大津市', '泉佐野市', '和泉市', '茨木市', '大阪狭山市', '大阪市旭区', '大阪市阿倍野区', '大阪市生野区', '大阪市北区', '大阪市此花区', '大阪市城東区', '大阪市住之江区', '大阪市住吉区', '大阪市大正区', '大阪市中央区', '大阪市鶴見区', '大阪市天王寺区', '大阪市浪速区', '大阪市西区', '大阪市西成区', '大阪市西淀川区', '大阪市東住吉区', '大阪市東成区', '大阪市東淀川区', '大阪市平野区', '大阪市福島区', '大阪市港区', '大阪市都島区', '大阪市淀川区', '貝塚市', '柏原市', '交野市', '門真市', '河内長野市', '岸和田市', '堺市北区', '堺市堺区', '堺市中区', '堺市西区', '堺市東区', '堺市南区', '堺市美原区', '四條畷市', '吹田市', '摂津市', '泉南郡熊取町', '泉南郡田尻町', '泉南郡岬町', '泉南市', '泉北市', '泉北郡忠岡市', '高石市', '高槻市', '大東市', '豊中市', '豊能郡豊能町', '豊能郡能勢町', '富田林市', '寝屋川市', '羽曳野市', '阪南市', '東大阪市', '枚方市', '藤井寺市', '松原市', '三島郡島本市', '南河内郡河南町', '南河内郡太子町', '南河内郡千早赤坂村', '箕面市', '守口市', '八尾市' ], 
    [ '綾部市', '宇治市', '乙訓郡大山崎町', '亀岡市', '京田辺市', '京丹後市', '京都市右京区', '京都市上京区', '京都市北区', '京都市左京区', '京都市下京区', '京都市中京区', '京都市西京区', '京都市東京区', '京都市伏見区', '京都市南区', '京都市山科区', '木津川区', '久世郡久御山町', '城陽市', '相楽郡笠置町', '相楽郡精華町', '相楽郡南山城村', '相楽郡和束町', '綴喜郡井手町', '綴喜郡宇治田原町', '長岡京市', '南丹市', '福知山市', '船井郡京丹波町', '舞鶴市', '宮津市', '向日市', '八幡市', '与謝郡伊根町', '与謝郡与謝野町' ], 
    [ '相生市', '明石市', '赤穂郡上郡町', '赤穂市', '朝来市', '芦屋市', '尼崎市', '淡路市', '伊丹市', '揖保郡太子町', '小野氏', '加古川市', '加古群稲美町', '加古郡播磨町', '加西市', '加東市', '川西市', '河辺郡猪名川町', '神崎郡市川町', '神崎郡神河町', '神崎郡福崎町', '神戸市北区', '神戸市須磨区', '神戸市垂水区', '神戸市中央区', '神戸市長田区', '神戸市灘区', '神戸市西区', '神戸市兵庫区', '神戸市東灘区', '篠山市', '佐用郡佐用町', '三田市', '穴粟市', '洲本市', '多可郡多可町', '高砂市', '宝塚市', 'たつの市', '丹波市', '豊岡市', '西宮市', '西脇市', '姫路市', '美方郡香美町', '美方郡新温泉町', '三木市', '南あわじ市', '養父市' ], 
    [ '犬上郡甲良町', '犬上郡多賀町', '犬上郡豊郷町', '愛知郡愛荘町', '近江八幡市', '大津市', '蒲生郡日野町', '蒲生郡竜王町', '草津市', '甲賀市', '湖南市', '高島市', '長浜市', '東近江市', '彦根市', '米原氏', '守山市', '野洲市', '粟東市' ], 
    [ '生駒郡安堵町', '生駒郡斑鳩町', '生駒郡三郷町', '生駒郡平群町', '生駒市', '宇陀郡曽爾村', '宇陀郡御杖村', '宇陀市', '橿原市', '香芝市', '葛城市', '北葛城郡王寺町', '北葛城郡河合町', '北葛城郡上牧町', '北葛城郡広陵町', '五條市', '御所市', '桜井市', '磯城郡川西町', '磯城郡田原本町', '磯城郡三宅町', '高市郡明日香村', '高市郡高取町', '天理市', '奈良市', '大和郡山市', '大和高田市', '山辺郡山添村', '吉野郡大淀町', '吉野郡上北山村', '吉野郡川上村', '吉野郡黒滝村', '吉野郡下市町', '吉野郡下北山村', '吉野郡天川村', '吉野郡十津川村', '吉野郡野迫川村', '吉野郡東吉野村', '吉野郡吉野村' ], 
    [ '有田郡有田川町', '有田郡広川町', '有田郡湯浅町', '有田市', '伊都郡かつらぎ町', '伊都郡九度山町', '伊都郡高野町', '岩出市', '海草郡紀美野町', '海南市', '紀の川市', '御坊市', '新宮市', '田辺市', '西牟婁郡上富田町', '西牟婁郡白浜町', '西牟婁郡すさみ町', '橋本市', '東牟婁郡北山村', '東牟婁郡串本町', '東牟婁郡古座川町', '東牟婁郡太地町', '東牟婁郡那智勝浦町', '日高郡印南町', '日高郡日高川町', '日高郡日高町', '日高郡みなべ町', '日高郡美浜町', '日高郡由良町', '和歌山市' ], 
    [ '伊賀市', '伊勢市', '員弁郡東員町', 'いなべ市', '尾鷲市', '亀山市', '北牟婁郡紀北町', '熊野市', '桑名郡木曽岬町', '桑名市', '志摩市', '鈴鹿市', '多気郡大台町', '多気郡多気町', '多気郡明和町', '津　市', '鳥羽市', '名張市', '松阪市', '三重郡朝日町', '三重郡川越町', '三重郡菰野町', '南牟婁郡紀宝町', '南牟婁郡御浜町', '四日市市', '度会郡大紀町', '度会郡玉城町', '度会郡南伊勢町', '度会郡度会町' ], 

    [ '今治市', '伊予郡砥部町', '伊予郡松前町', '伊予市', '宇和島市', '大洲市', '越智郡上島町', '上浮穴郡久万高原町', '北宇和郡鬼北町', '北宇和郡松野町', '喜多郡内子町', '西条市', '四国中央市', '西予市', '東温市', '新居浜市', '西宇和郡伊方町', '松山市', '南宇和郡愛南町', '八幡浜市' ], 
    [ '綾歌郡綾川町', '綾歌郡宇多津町', '香川郡直島町', '観音寺市', '木田郡三木町', '坂出市', 'さぬき市', '小豆郡小豆島町', '小豆郡土庄町', '善通寺市', '高松市', '仲多度郡琴平町', '仲多度郡多度津町', '東かがわ市', '丸亀市', '三豊市' ], 
    [ '阿南市', '阿波市', '板野郡藍住町', '板野郡板野町', '板野郡上板町', '板野郡北島町', '板野郡松茂町', '海部郡海陽町', '海部郡美波町', '海部郡牟岐町', '勝浦郡勝浦町', '勝浦郡上勝町', '小松島市', '徳島市', '那賀郡那賀町', '鳴門市', '名西郡石井町', '名西郡神山町', '名東郡佐那河内村', '美馬郡つるぎ町', '三好市', '吉野川市' ], 
    [ '吾川郡いの町', '吾川郡仁淀川町', '安芸郡馬路村', '安芸郡北川村', '安芸郡芸西村', '安芸郡田野町', '安芸郡東洋町', '安芸郡奈半利町', '安芸郡安田町', '安芸市', '香美市', '高知市', '香南市', '四万十市', '宿毛市', '須崎市', '高岡郡越知町', '高岡郡佐川町', '高岡郡四万十町', '高岡郡津野町', '高岡郡中土佐町', '高岡郡日高村', '土佐郡大川村', '土佐郡土佐町', '土佐市', '土佐清水市', '長岡郡大豊町', '長岡郡本山町', '南国市', '幡多郡大月町', '幡多郡黒潮町', '幡多郡三原村', '室戸市' ], 

    [ '安芸郡海田町', '安芸郡熊野町', '安芸郡坂町', '安芸郡府中町', '安芸高田市', '江田島市', '大竹市', '尾道市', '呉市', '庄原市', '神石郡神石高原町', '世羅郡世羅町', '竹原市', '豊田郡大崎上島町', '廿日市市', '東広島市', '広島市安芸区', '広島市安佐北区', '広島市安佐南区', '広島市佐伯区', '広島市中区', '広島市西区', '広島市東区', '広島市南区', '福山市', '府中市', '三原市', '三次市', '山県郡安芸太田町', '山県郡北広島町' ], 
    [ '英田郡西粟倉村', '赤磐市', '浅口郡里庄町', '浅口市', '井原市', '岡山市北区', '岡山市中区', '岡山市東区', '岡山市南区', '小田郡矢掛町', '加賀郡吉備中央町', '笠岡市', '勝田郡勝央町', '勝田郡奈義町', '久米郡久米南町', '久米郡美咲町', '倉敷市', '瀬戸内市', '総社市', '高梁市', '玉野市', '都窪郡早島町', '津山市', '苫田郡鏡野町', '新見市', '備前市', '真庭郡新庄村', '真庭市', '美作市', '和気郡和気町' ], 
    [ '阿武郡阿武町', '岩国市', '宇部市', '大島郡周防大島町', '玖珂郡和木町', '下松市', '毛郡田上関町', '毛郡田布施町', '熊毛郡平生町', '山陽小野田市', '周南市', '下関市', '長門市', '萩市', '光市', '防府市', '美祢市', '柳井市', '山口市' ],
    [ '岩美郡岩美町', '倉吉市', '西伯郡大山町', '西伯郡南部町', '西伯郡日吉津村', '西伯郡伯耆町', '境港市', '鳥取市', '東伯郡琴浦町', '東伯郡北栄町', '東伯郡三朝町', '東伯郡湯梨浜町', '日野郡江府町', '日野郡日南町', '日野郡日野町', '八頭郡智頭町', '八頭郡八頭町', '八頭郡若桜町', '米子' ], 
    [ '飯石郡飯南町', '出雲市', '大田市', '邑智郡邑南町', '邑智郡川本町', '邑智郡美郷町', '隠岐郡隠岐の島町', '隠岐郡知夫村', '隠岐郡西ﾉ島町', '鹿足郡津和野町', '鹿足郡吉賀町', '江津市', '仁多郡奥出雲町', '浜田市', '益田市', '松江市', '安来市' ], 

    [ '朝倉郡筑前町', '朝倉郡東峰村', '朝倉市', '飯塚市', '糸島市', 'うきは市', '大川市', '大野城市', '大牟田市', '小郡市', '遠賀郡芦屋町', '遠賀郡岡垣町', '遠賀郡遠賀町', '遠賀郡水巻町', '春日市', '糟屋郡宇美町', '糟屋郡粕屋町', '糟屋郡篠栗町', '糟屋郡志免町', '糟屋郡新宮町', '糟屋郡須恵町', '糟屋郡久山町', '嘉穂郡桂川町', '嘉麻市', '北九州市小倉北区', '北九州市小倉南区', '北九州市戸畑区', '北九州市門司区', '北九州市八幡西区', '北九州市八幡東区', '北九州市若松区', '鞍手郡鞍手町', '鞍手郡小竹町', '久留米市', '古賀市', '田川郡赤村', '田川郡糸田町', '田川郡大任町', '田川郡川崎町', '田川郡香春町', '田川郡添田町', '田川郡福智町', '田川市', '太宰府市', '筑後市', '筑紫野市', '築上郡上毛町', '築上郡築上町', '築上郡吉富町', '那珂川町', '中間市', '直方市', '福岡市早良区', '福岡市城南区', '福岡市中央区', '福岡市西区', '福岡市博多区', '福岡市東区', '福岡市南区', '福津市', '豊前市', '三井郡大刀洗町', '三潴郡大木町', '京都郡苅田町', '京都郡みやこ町', 'みやま市', '宮若市', '宗像市', '柳川市', '八女郡広川町', '八女市', '行橋市' ], 
    [ '伊万里市', '嬉野市', '小城市', '鹿島市', '唐津市', '神埼郡吉野ヶ里町', '神埼市', '杵島郡大町町', '杵島郡江北町', '杵島郡白石町', '佐賀市', '多久市', '武雄市', '鳥栖市', '西松浦郡有田町', '東松浦郡玄海町', '藤津郡太良町', '三養基郡上峰町', '三養基郡基山町', '三養基郡みやき町' ], 
    [ '壱岐市', '諫早市', '雲仙市', '大村市', '北松浦郡小値賀町', '北松浦郡佐々町', '五島市', '西海市', '佐世保市', '島原市', '対馬市', '長崎市', '西彼杵郡時津町', '西彼杵郡長与町', '東彼杵郡川棚町', '東彼杵郡波佐見町', '東彼杵郡東彼杵町', '平戸市', '松浦市', '南島原市', '南松浦郡新上五島町' ], 
    [ '葦北郡芦北町', '葦北郡津奈木町', '阿蘇郡産山村', '阿蘇郡小国町', '阿蘇郡高森町', '阿蘇郡南阿蘇村', '阿蘇郡小国町', '阿蘇市', '天草郡苓北町', '天草市', '荒尾市', '宇城市', '宇土市', '上天草市', '上益城郡嘉島町', '上益城郡甲佐町', '上益城郡益城町', '上益城郡御船町', '上益城郡山都町', '菊池郡大津町', '菊池郡菊陽町', '菊池市', '球磨郡あさぎり町', '球磨郡五木村', '球磨郡球磨村', '球磨郡相良村', '球磨郡多良木町', '球磨郡錦町', '球磨郡水上村', '球磨郡山江村', '球磨郡湯前町', '熊本市北区', '熊本市中央区', '熊本市西区', '熊本市東区', '熊本市南区', '合志市', '下益城郡美里町', '玉名郡玉東町', '玉名郡長洲町', '玉名郡和水町', '玉名郡南関町', '玉名市', '人吉市', '水俣市', '八代郡氷川町', '八代市', '山鹿市' ], 
    [ '宇佐市', '臼杵市', '大分市', '杵築市', '玖珠郡玖珠町', '玖珠郡九重町', '国東市', '佐伯市', '竹田市', '津久見市', '中津市', '速見郡日出町', '東国東郡姫島村', '日田市', '豊後大野市', '豊後高田市', '別府市', '由布市' ], 
    [ 'えびの市', '北諸県郡三股町', '串間市', '小林市', '児湯郡川南町', '児湯郡木城町', '児湯郡新富町', '児湯郡高鍋町', '児湯郡都農町', '児湯郡西米良村', '西都市', '西臼杵郡五ヶ瀬町', '西臼杵郡高千穂町', '西臼杵郡日之影町', '西諸県郡高原町', '日南市', '延岡市', '日向市', '東臼杵郡門川町', '東臼杵郡椎葉村', '東臼杵郡美郷町', '東臼杵郡諸塚村', '東諸県郡綾町', '東諸県郡国富町', '都城市', '宮崎市' ], 
    [ '姶良郡湧水町', '姶良市', '阿久根市', '奄美市', '伊佐市', '出水郡長島町', '出水市', 'いちき串木野市', '指宿市', '大島郡天城町', '大島郡伊仙町', '大島郡宇検村', '大島郡喜界町', '大島郡瀬戸内町', '大島郡龍郷町', '大島郡知名町', '大島郡徳之島町', '大島郡大和村', '大島郡与論町', '大島郡和泊町', '鹿児島郡十島村', '鹿児島郡三島村', '鹿児島市', '肝属郡肝付町', '肝属郡錦江町', '肝属郡東串良町', '肝属郡南大隅町', '霧島市', '熊毛郡中種子町', '熊毛郡南種子町', '熊毛郡屋久島町', '薩摩郡さつま町', '薩摩川内市', '志布志市', '曽於郡大崎町', '曽於市', '西之表市', '日置市', '枕崎市', '南九州市', '南さつま市' ]

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
            $(target).append('<option value="' + i + '">' + city[idx][i] + '</option>');
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
        ret = process_target_city($(this).val(), '#select_city_02');
        if (ret == null) {
            getCitySelection('#select_prefecture_02', '#select_city_02', './assets/js/address/prefectureCityCode.json', valType);
        }
    });
});