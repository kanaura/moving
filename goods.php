<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

// $page_ttl = '家財の選択 | 株式会社ハコビズ';
$page_ttl = '家財の選択 | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
include_once('./global.php');
?>

<?php
if (isset($_POST['select_pref_01'])) {
    $_SESSION['sel_pref_01'] = $_POST['select_pref_01'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['select_city_01'])) {
    $_SESSION['sel_city_01'] = $_POST['select_city_01'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['select_pref_02'])) {
    $_SESSION['sel_pref_02'] = $_POST['select_pref_02'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['select_city_02'])) {
    $_SESSION['sel_city_02'] = $_POST['select_city_02'];
} else {
    header('Location: ' . './');
}

$area_01_id = get_area_idx($_SESSION['sel_pref_01'], $_SESSION['sel_city_01']);
$area_02_id = get_area_idx($_SESSION['sel_pref_02'], $_SESSION['sel_city_02']);
if (!($area_01_id >= 0 && $area_01_id <= 3)) {
    header('Location: ' . './exception.php');
}
if (!($area_02_id >= 0 && $area_02_id <= 6)) {
    header('Location: ' . './exception.php');
}
?>

<body class="select select-01">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <form action="./options.php" method="POST">
                <div class="select-head">
                    <div class="select-head-l">
                        <p class="select-head-l-ttl">
                            <span>家財メーター</span>
                            お運びする家財の量を表示いたします。
                        </p>
                        <div class="select-head-bar-list">
                            <div class="select-head-bar-item">
                                <span>～5立米</span>
                            </div>
                            <div class="select-head-bar-item">
                                <span>～10立米</span>
                            </div>
                            <div class="select-head-bar-item">
                                <span>～16立米</span>
                            </div>
                            <div class="select-head-bar-item">
                                <span>～23立米</span>
                            </div>
                        </div>
                    </div>
                    <div class="select-head-r">
                        <p class="select-head-r-ttl">現在の家財</p>
                        <p class="select-head-cur-value">
                            <span id="calc-total">0.0</span>立米
                            <input id="total-base" type="hidden" name="total_base" value="0" />
                            <input id="total-m3" type="hidden" name="total_m3" value="0" />
                            <input id="total-cm3" type="hidden" name="total_cm3" value="0" />
                        </p>
                    </div>
                </div>

                <div class="select-body">
                    <p class="select-body-ttl ttl-blue-wide">家財を選ぶ</p>

                    <div class="select-list">
                        <?php 
                        for ($i = 0; $i < count($goods); $i++) :
                            $info = $goods[$i];
                        ?>
                            <div class="select-item">
                                <p class="select-item-head"><?=$info['ttl'];?></p>
                                <div class="select-item-body">
                                    <table class="has-image">
                                        <?php
                                        for ($j = 0; $j < count($info['items']); $j++) :
                                            $item = $info['items'][$j];
                                        ?>
                                            <tr>
                                                <th>
                                                    <img src="./assets/img/goods/<?=$item['img'];?>" alt="" />
                                                </th>
                                                <td>
                                                    <?php if (count($item['items'])) : ?>
                                                        <div class="item-name">
                                                            <?=$item['ttl'];?>
                                                            <span class="select-size" data-target="sub-item-<?=$i;?><?=$j;?>">サイズ選択</span>
                                                        </div>
                                                        <ul id="sub-item-<?=$i;?><?=$j;?>" class="sub-item-list">
                                                            <?php
                                                            for ($k = 0; $k < count($item['items']); $k++) :
                                                                $sub_item = $item['items'][$k];
                                                                $class = (($k % 2) != 0) ? 'gray' : '';
                                                            ?>
                                                                <li class="<?=$class;?>">
                                                                    <div class="item-name">
                                                                        <?=$sub_item['ttl'];?>
                                                                        <p class="item-ctrl">
                                                                            <?php if (!$sub_item['single']) : ?>
                                                                            <span class="num">0</span>台
                                                                            <?php else : ?>
                                                                            <span class="num single single-<?=$sub_item['idx'];?>">0</span>台
                                                                            <?php endif; ?>
                                                                            <span class="up good"></span>
                                                                            <span class="dn good"></span>
                                                                        </p>
                                                                        <input type="hidden" class="ttl" name="goods_ttl[<?=$sub_item['idx'];?>]" value="<?=$sub_item['full_ttl'];?>" />
                                                                        <input type="hidden" class="cnt" name="goods_cnt[<?=$sub_item['idx'];?>]" value="0" />
                                                                        <input type="hidden" class="size" name="goods_size[<?=$sub_item['idx'];?>]" value="<?=$sub_item['size'];?>" />
                                                                    </div>
                                                                </li>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        <div class="item-name">
                                                            <?=$item['ttl'];?>
                                                            <p class="item-ctrl">
                                                                <?php if (!$item['single']) : ?>
                                                                <span class="num">0</span>台
                                                                <?php else : ?>
                                                                <span class="num single single-<?=$item['idx'];?>">0</span>台
                                                                <?php endif; ?>
                                                                <span class="up good"></span>
                                                                <span class="dn good"></span>
                                                            </p>
                                                            <input type="hidden" class="ttl" name="goods_ttl[<?=$item['idx'];?>]" value="<?=$item['ttl'];?>" />
                                                            <input type="hidden" class="cnt" name="goods_cnt[<?=$item['idx'];?>]" value="0" />
                                                            <input type="hidden" class="size" name="goods_size[<?=$item['idx'];?>]" value="<?=$item['size'];?>" />
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </table>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <div class="select-item">
                            <p class="select-item-head">フリー入力</p>
                            <div class="select-item-body">
                                <table>
                                    <tbody>
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <tr>
                                            <td>
                                                <div class="item-name">
                                                    <div class="free-row">
                                                        <span>縦</span>
                                                        <input type="text" />
                                                        <span>cm ×&nbsp;</span><br class="br-768">
                                                        <span>横</span>
                                                        <input type="text" />
                                                        <span>cm ×&nbsp;</span><br class="br-768">
                                                        <span>高さ</span>
                                                        <input type="text" />
                                                        <span>cm</span>
                                                    </div>
                                                    <p class="item-ctrl">
                                                        <span class="num">0</span>台
                                                        <span class="up good"></span>
                                                        <span class="dn good"></span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="txt txt-has-star">
                    リスト内に掲載のない家財がある場合は、上記の「フリー入力」バナーを開いて家財の寸法（縦・横・高さ）をご入力ください。
                </p>

                <div class="select-standalone">
                    <div class="standalone-icon">
                        <img src="./assets/img/select/standalone.png" alt="" />
                    </div>
                    <div class="standalone-info">
                        <p class="standalone-info-ttl">単身楽チョイス</p>
                        <p class="standalone-info-txt">
                            コチラのボタンを押すと、下記の「単身者さまの基本的な家財」が自動で選択されますので、そこからお客様の家財に合わせて数量の変更、家財の追加・削除をしてください。
                        </p>
                    </div>
                    <p class="standalone-desc">
                        「単身楽チョイス」ボタンでの家財選択でもお見積り可能ですが、より正確なお見積りを行える様、必ず数量の変更、追加・削除を行ってください。
                    </p>
                </div>

                <div class="select-object">
                    <p class="select-object-ttl"><span>選択される家財</span></p>
                    <p class="select-object-txt txt">
                        テレビ（32型以下）・冷蔵庫（100〜200L）・洗濯機（4〜8kg）・レンジ・エアコン・掃除機<br>
                        ガスコンロ・ベッド（シングル）・マットレス（シングル）・メタルラック（横幅60cm以下）<br>
                        ローボード・姿見・カーペット（6畳まで）・ソファー（2人掛け）・衣装ケース（3段以上）<br>
                        ローテーブル（横幅120cm以下）・カラーボックス（3段以上）・布団一式・物干し竿<br>
                        自転車（大人用）・ダンボール（大）5個
                    </p>
                </div>

                <div class="bottom-btn-list">
                    <button type="button" class="btn btn-back" onclick="history.go(-1);">戻る</button>
                    <button type="submit" class="btn btn-default">オプションの選択</button>
                    <button type="button" class="btn btn-clear good" href="">クリア</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/goods/goods.js"></script>
</body>
</html>