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
?>

<body class="select select-infos select-price">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="select-body">
                <p class="select-body-ttl ttl-blue-wide">入力内容の確認</p>
                <p class="select-overview">
                    <span class="small right">この度のお客様の<br>家財Lv.は</span>
                    <span class="large"><?=$_SESSION['total_m3'];?></span>
                    <span class="medium">立米</span>
                    <span class="small">です。</span>
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
                    <p class="select-info-date">2022年 7月 8日 (金) 午前</p>
                </div>

                <p class="select-body-ttl ttl-blue-wide">お問い合わせ・ご要望</p>
                <div class="select-message">
                    <textarea rows="4"></textarea>
                </div>
            </div>

            <div class="bottom-btn-list">
                <a class="btn btn-back" href="./select-date.php">戻る</a>
                <a class="btn btn-default" href="./select-price.php">お見積り</a>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>