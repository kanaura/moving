<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

$page_ttl = '入力内容の確認 | 株式会社ハコビズ';

include_once('./head.php');
include_once('./global.php');
?>

<?php
function get_pref($pref_id)
{
    global $address;

    $result = null;

    for ($i = 0; $i < count($address); $i++) {
        if ($address[$i]['id'] == $pref_id) {
            $result = $address[$i];
            break;
        }
    }

    return $result;
}

function str_date($date)
{
    $date = date($date);
    return date('Y年m月d日 ', strtotime($date));
}

if (isset($_POST['date'])) {
    $_SESSION['date'] = $_POST['date'];
}

if (isset($_POST['time'])) {
    $_SESSION['time'] = $_POST['time'];
}
?>

<body class="select select-infos select-price">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <form action="./price.php" method="POST">
                <div class="select-body">
                    <p class="select-body-ttl ttl-blue-wide">入力内容の確認</p>
                    <p class="select-overview">
                        <span class="small right">この度のお客様の<br>家財Lv.は</span>
                        <span class="large"><?=$_SESSION['total_m3'];?></span>
                        <span class="medium">立米</span>
                        <span class="small">です。</span>
                        <input id="total-base" type="hidden" name="total_base" value="<?=$_SESSION['total_cm3'];?>" />
                        <input id="total-m3" type="hidden" name="total_m3" value="<?=$_SESSION['total_m3'];?>" />
                        <input id="total-cm3" type="hidden" name="total_cm3" value="<?=$_SESSION['total_cm3'];?>" />
                    </p>

                    <p class="select-body-ttl ttl-blue-wide">お客様情報</p>
                    <div class="select-info-table">
                        <table>
                            <tr>
                                <td class="sht">お名前</td>
                                <td class="lng"></td>
                            </tr>
                            <tr>
                                <td class="sht">現住所</td>
                                <td class="lng">
                                    <?php
                                    $pref = get_pref($_SESSION['sel_pref_01']);
                                    if ($pref != null) :
                                    ?>
                                    <?=$pref['name'];?>&nbsp;
                                    <?=$pref['city'][$_SESSION['sel_city_01']];?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="sht">転居先</td>
                                <td class="lng">
                                    <?php
                                    $pref = get_pref($_SESSION['sel_pref_02']);
                                    if ($pref != null) :
                                    ?>
                                    <?=$pref['name'];?>&nbsp;
                                    <?=$pref['city'][$_SESSION['sel_city_02']];?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <p class="select-body-ttl ttl-blue-wide">選んだ家財</p>
                    <div class="select-info-table">
                        <table>
                            <?php
                            $goods_ttl = $_SESSION['goods_ttl'];
                            $goods_cnt = $_SESSION['goods_cnt'];
                            for ($i = 0; $i < count($_SESSION['goods_ttl']); $i++) :
                                if ($goods_cnt[$i] != 0) :
                            ?>
                            <tr>
                                <td class="lng"><?=$goods_ttl[$i];?></td>
                                <td class="sht"><?=$goods_cnt[$i];?>台</td>
                            </tr>
                            <?php
                                endif;
                            endfor; 
                            ?>
                        </table>
                    </div>

                    <p class="select-body-ttl ttl-blue-wide">オプション</p>
                    <div class="select-info-table">
                        <table>
                            <?php
                            $options_ttl = $_SESSION['options_ttl'];
                            $options_cnt = $_SESSION['options_cnt'];
                            for ($i = 0; $i < count($_SESSION['options_ttl']); $i++) :
                                if ($options_cnt[$i] != 0) :
                            ?>
                            <tr>
                                <td class="lng"><?=$options_ttl[$i];?></td>
                                <td class="sht"><?=$options_cnt[$i];?>台</td>
                            </tr>
                            <?php
                                endif;
                            endfor; 
                            ?>
                        </table>
                    </div>

                    <p class="select-body-ttl ttl-blue-wide">お引越予定日</p>
                    <div class="select-info-date-wrapper">
                        <p class="select-info-date">
                            <?php echo str_date($_SESSION['date']); ?>
                            <?php echo ($_SESSION['time'] == 'am') ? '午前' : '午後'; ?>
                        </p>
                    </div>

                    <p class="select-body-ttl ttl-blue-wide">お問い合わせ・ご要望</p>
                    <div class="select-message">
                        <textarea rows="4"></textarea>
                    </div>
                </div>

                <div class="bottom-btn-list">
                    <button type="button" class="btn btn-back" onclick="history.back()">戻る</button>
                    <button type="submit" class="btn btn-default">お見積り</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>