<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

// $page_ttl = 'お見積り金額 | 株式会社ハコビズ';
$page_ttl = 'お見積り金額 | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
include_once('./global.php');
?>

<?php
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

$truck_id = get_truck_idx($_SESSION['total_cm3']);

$area_01_id = get_area_idx($_SESSION['sel_pref_01'], $_SESSION['sel_city_01']);
$area_02_id = get_area_idx($_SESSION['sel_pref_02'], $_SESSION['sel_city_02']);
$price_good = $price_goods[$area_01_id][$truck_id][$area_02_id];

function calc_price_option() {
    $sum = 0;
    for ($i = 0; $i < count($_SESSION['options_cnt']); $i++) {
        $cnt = $_SESSION['options_cnt'][$i];
        $price = $_SESSION['options_price'][$i];
        if ($cnt != 0) {
            $sum += ($price * $cnt);    
        }
    }

    return $sum;
}

$price_option = calc_price_option();

$price_tax = intval(($price_good + $price_option) * 0.1);

$price_total = $price_good + $price_option + $price_tax;
?>

<body class="select select-infos select-price">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="select-body">
                <p class="select-body-ttl ttl-blue-wide">お見積り金額</p>
                <p class="select-overview">
                    <span class="small right">この度のお客様の<br>家財Lv.は</span>
                    <span class="large"><?=$_SESSION['total_m3'];?></span>
                    <span class="medium">立米</span>
                    <span class="small">です。</span>
                    <input id="total-base" type="hidden" name="total_base" value="<?=$_SESSION['total_cm3'];?>" />
                    <input id="total-m3" type="hidden" name="total_m3" value="<?=$_SESSION['total_m3'];?>" />
                    <input id="total-cm3" type="hidden" name="total_cm3" value="<?=$_SESSION['total_cm3'];?>" />
                </p>

                <form id="form-price" action="./final.php" method="POST">
                    <div class="price-body">
                        <p class="ttl-blue-wide ttl-blue-wide-full">お引越料金（税込）</p>
                        <div class="price-wrapper">
                            <p class="price">
                                <span><?=number_format($price_total);?></span>円～
                            </p>
                        </div>
                        <div class="price-table">
                            <table>
                                <tr>
                                    <th>明細</th>
                                    <th>料金</th>
                                </tr>
                                <tr>
                                    <td>基本料金</td>
                                    <td>
                                        <?=number_format($price_good);?>
                                        <input type="hidden" name="price_good" value="<?=number_format($price_good);?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>オプション</td>
                                    <td>
                                        <?=number_format($price_option);?>
                                        <input type="hidden" name="price_option" value="<?=number_format($price_option);?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>消費税</td>
                                    <td>
                                        <?=number_format($price_tax);?>
                                        <input type="hidden" name="price_tax" value="<?=number_format($price_tax);?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>合計金額</td>
                                    <td>
                                        <?=number_format($price_total);?>
                                        <input type="hidden" name="price_total" value="<?=number_format($price_total);?>" />
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="attention">
                            <p class="attention-head">注意事項</a>
                            <div class="attention-body">
                                <div class="attention-txt">
                                    ・旧居もしくはご新居が4階以上のマンションの場合、別途料金となります。<br>
                                    ・ご家財や間取りにより、窓吊り作業等の特殊作業が発生した場合は別途料金となります。<br>
                                    ・お運びするご家財に高価品（目安：購入時30万円以上）がある場合はお申込み内容確認のお打合せ時に当社受付担当者より確認をさせていただきます。<br>
                                    ・火薬類、化学薬品類、石油・灯油類の揮発油製品などの危険物や燃料が入った状態の原付・バイク・ストーブ等も取扱い不可能品目となります。<br>
                                    ・現金、貴金属等の貴重品につきましてはお客さまにて管理をお願いします。<br>
                                    ・お申込内容、料金等の確認のため、後ほど当社受付担当者よりお電話させていただきます。<br>
                                    当社担当者とお打合せ後、本契約となりますので、ご了承くださいませ。<br><br>
                                    
                                    上記注意事項とその他注意事項の詳細に関してはこちらをご確認いただき<br>
                                    「同意いたしました」にチェックを入れてください。
                                </div>
                                <div class="attention-agree">
                                    <div class="chk-wrapper">
                                        <input id="chk-agree" type="checkbox">
                                        <label for="chk-agree">同意いたします。</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bottom-btn-list">
                        <button type="button" class="btn btn-back" onclick="history.back()">戻る</button>
                        <button id="btn-submit" type="submit" class="btn btn-default">この内容で仮申込をする</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/price/price.js"></script>
</body>
</html>