<?php
session_start();

$page_ttl = '住所の選択 | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
include_once('./global.php');
?>

<body class="form">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="main-figure">
                <img src="./assets/img/main.png" alt="" />
            </div>

            <div id="select-content-head" class="select-content" style="display: none;">
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
            </div>

            <form action="./goods.php" method="POST">
                <div class="address-content">
                    <div class="address-select-block">
                        <p class="address-select-block-ttl">現住所</p>
                        <div class="address-select-wrapper">
                            <select name="select_pref_01" id="select_prefecture_01" >
                                <option>都道府県を選択</option>
                            </select>
                        </div>
                        <div class="address-select-wrapper">
                            <select name="select_city_01" id="select_city_01">
                                <option value="">市町村を選択</option>
                            </select>
                        </div>
                    </div>

                    <div class="address-select-block">
                        <p class="address-select-block-ttl">転居先</p>
                        <div class="address-select-wrapper">
                            <select name="select_pref_02" id="select_prefecture_02" >
                                <option value="">都道府県を選択</option>
                            </select>
                        </div>
                        <div class="address-select-wrapper">
                            <select name="select_city_02" id="select_city_02">
                                <option value="">市町村を選択</option>
                            </select>
                        </div>
                    </div>

                    <p class="txt txt-has-star txt-case-no-address">
                        選択肢に現住所・転居先が表示されていない場合は別途お見積もりとなりますので<br class="br-768-no">下記よりお問い合わせください
                    </p>
                </div>

                <div class="good-select-content select-content" style="display: none;">
                    <div class="select-body">
                        <p class="select-body-ttl ttl-blue-wide">家財を選ぶ</p>

                        <div class="select-list">
                            <div id="select-list-top"></div>
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
                                                                            <?php if (!$sub_item['single']) : ?>
                                                                            <select class="item-ctrl num good">
                                                                            <?php else : ?>
                                                                            <select class="item-ctrl num good single single-<?=$sub_item['idx'];?>">
                                                                            <?php endif; ?>
                                                                                <?php for ($cnt = 0; $cnt <= 50; $cnt++) : ?>
                                                                                <option value="<?=$cnt;?>"><?=$cnt;?>台</option>
                                                                                <?php endfor; ?>
                                                                            </select>
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
                                                                <?php if (!$item['single']) : ?>
                                                                <select class="item-ctrl num good">
                                                                <?php else : ?>
                                                                <select class="item-ctrl num  good single single-<?=$item['idx'];?>">
                                                                <?php endif; ?>
                                                                    <?php for ($cnt = 0; $cnt <= 50; $cnt++) : ?>
                                                                    <option value="<?=$cnt;?>"><?=$cnt;?>台</option>
                                                                    <?php endfor; ?>
                                                                </select>
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
                                                    <div class="item-name free-item">
                                                        <div class="free-row">
                                                            <span>縦</span>
                                                            <input type="number" class="input-free input-free-w" placeholder="縦(cm)" min="0" max="500" name="free_w[<?=$i;?>]" />
                                                            <span>cm ×&nbsp;</span><br class="br-768">
                                                            <span>横</span>
                                                            <input type="number" class="input-free input-free-h" placeholder="横(cm)" min="0" max="500" name="free_h[<?=$i;?>]" />
                                                            <span>cm ×&nbsp;</span><br class="br-768">
                                                            <span>高さ</span>
                                                            <input type="number" class="input-free input-free-d" placeholder="高(cm)" min="0" max="500" name="free_d[<?=$i;?>]" />
                                                            <span>cm</span>
                                                        </div>
                                                        <div class="item-ctrl free">
                                                            <select class="item-ctrl num good">
                                                                <?php for ($cnt = 0; $cnt <= 50; $cnt++) : ?>
                                                                <option value="<?=$cnt;?>"><?=$cnt;?>台</option>
                                                                <?php endfor; ?>
                                                            </select>
                                                            <input type="hidden" class="ttl free" name="free_ttl[<?=$i;?>]" value="フリー<?=$i+1;?>" />
                                                            <input type="hidden" class="cnt free" name="free_cnt[<?=$i;?>]" value="0" />
                                                            <input type="hidden" class="size free" name="free_size[<?=$i;?>]" value="0" />
                                                        </div>
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
                </div>

                <div class="bottom-btn-list">
                    <button type="button" class="btn btn-back">戻る</button>
                    <button type="button" class="btn btn-default">オプションの選択</button>
                    <button type="button" class="btn btn-clear good">クリア</button>
                </div>

                <div class="address-lead">
                    <p class="address-lead-head">
                        現地見積り【愛媛県内のみ】をご希望の方は<br class="br-480-no">コチラからお問い合わせください。
                    </p>
                    <div class="address-lead-body">
                        <div class="address-lead-btn-list">
                            <a class="address-lead-btn" href="tel:0120-557-154">お電話でお問い合わせ</a>
                            <a class="address-lead-btn" href="mailto:info@hacovice.com">メールでお問い合わせ</a>
                        </div>
                        <p class="txt txt-has-star address-lead-txt">
                            お見積り日程を調整後、ご自宅にお伺いして<br class="br-768-no">お見積りさせていただきます。
                        </p>
                    </div>
                    <div class="address-lead-deco">
                        <img src="./assets/img/address/lead-deco.png" alt="" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/flow.js"></script>
    <script src="./assets/js/address/address.js"></script>
    <script src="./assets/js/address/prefectureCity.js"></script>
    <script src="./assets/js/goods/goods.js"></script>
</body>
</html>