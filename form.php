<?php
session_start();

$page_ttl = '住所の選択 | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
include_once('./global.php');
?>

<body class="form-select">
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

            <form id="form-select" action="./final.php" method="POST">
                <div class="address-content">
                    <div class="address-select-block">
                        <p class="address-select-block-ttl">現住所</p>
                        <div class="address-select-wrapper">
                            <select name="sel_pref_01" id="select_prefecture_01" >
                                <option>都道府県を選択</option>
                            </select>
                        </div>
                        <div class="address-select-wrapper">
                            <select name="sel_city_01" id="select_city_01">
                                <option value="">市町村を選択</option>
                            </select>
                        </div>
                    </div>

                    <div class="address-select-block">
                        <p class="address-select-block-ttl">転居先</p>
                        <div class="address-select-wrapper">
                            <select name="sel_pref_02" id="select_prefecture_02" >
                                <option value="">都道府県を選択</option>
                            </select>
                        </div>
                        <div class="address-select-wrapper">
                            <select name="sel_city_02" id="select_city_02">
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
                                                                <span class="select-size" data-target="option-sub-item-<?=$i;?><?=$j;?>">サイズ選択</span>
                                                            </div>
                                                            <ul id="option-sub-item-<?=$i;?><?=$j;?>" class="sub-item-list">
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
                                                                            <input type="hidden" class="ttl goods-ttl" name="goods_ttl[<?=$sub_item['idx'];?>]" value="<?=$sub_item['full_ttl'];?>" />
                                                                            <input type="hidden" class="cnt goods-cnt" name="goods_cnt[<?=$sub_item['idx'];?>]" value="0" />
                                                                            <input type="hidden" class="size goods-size" name="goods_size[<?=$sub_item['idx'];?>]" value="<?=$sub_item['size'];?>" />
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
                                                                <input type="hidden" class="ttl goods-ttl" name="goods_ttl[<?=$item['idx'];?>]" value="<?=$item['ttl'];?>" />
                                                                <input type="hidden" class="cnt goods-cnt" name="goods_cnt[<?=$item['idx'];?>]" value="0" />
                                                                <input type="hidden" class="size goods-size" name="goods_size[<?=$item['idx'];?>]" value="<?=$item['size'];?>" />
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
                                                            <input type="number" class="input-free input-free-w" placeholder="縦(cm)" min="0" max="500" name="free_w[<?=$i;?>]" value="0" />
                                                            <span>cm ×&nbsp;</span><br class="br-768">
                                                            <span>横</span>
                                                            <input type="number" class="input-free input-free-h" placeholder="横(cm)" min="0" max="500" name="free_h[<?=$i;?>]" value="0" />
                                                            <span>cm ×&nbsp;</span><br class="br-768">
                                                            <span>高さ</span>
                                                            <input type="number" class="input-free input-free-d" placeholder="高(cm)" min="0" max="500" name="free_d[<?=$i;?>]" value="0" />
                                                            <span>cm</span>
                                                        </div>
                                                        <div class="item-ctrl free">
                                                            <select class="item-ctrl num good">
                                                                <?php for ($cnt = 0; $cnt <= 50; $cnt++) : ?>
                                                                <option value="<?=$cnt;?>"><?=$cnt;?>台</option>
                                                                <?php endfor; ?>
                                                            </select>
                                                            <input type="hidden" class="ttl free free-ttl" name="free_ttl[<?=$i;?>]" value="フリー<?=$i+1;?>" />
                                                            <input type="hidden" class="cnt free free-cnt" name="free_cnt[<?=$i;?>]" value="0" />
                                                            <input type="hidden" class="size free free-size" name="free_size[<?=$i;?>]" value="0" />
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

                <div class="option-select-content select-content" style="display: none;">
                    <div class="select-body">
                        <p class="select-body-ttl ttl-blue-wide">オプション</p>

                        <div class="select-list">
                            <div id="select-list-top"></div>
                            <?php
                            for ($i = 0; $i < count($options); $i++) :
                                $option = $options[$i];
                            ?>
                            <div class="select-item">
                                <p class="select-item-head"><?=$option['ttl'];?></p>
                                <div class="select-item-body">
                                    <table>
                                        <?php
                                        for ($j = 0; $j < count($option['items']); $j++) :
                                            $item = $option['items'][$j];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php if (count($item['items'])) : ?>
                                                    <div class="item-name">
                                                        <?=$item['ttl'];?>
                                                        <span class="select-size" data-target="good-sub-item-<?=$i;?><?=$j;?>">サイズ選択</span>
                                                    </div>
                                                    <ul id="good-sub-item-<?=$i;?><?=$j;?>" class="sub-item-list">
                                                        <?php
                                                        for ($k = 0; $k < count($item['items']); $k++) :
                                                            $sub_item = $item['items'][$k];
                                                            $class = (($k % 2) != 0) ? 'gray' : '';
                                                        ?>
                                                            <li class="<?=$class;?>">
                                                                <div class="item-name">
                                                                    <?=$sub_item['ttl'];?>
                                                                    <select class="item-ctrl num">
                                                                        <?php for ($cnt = 0; $cnt <= 50; $cnt++) : ?>
                                                                        <option value="<?=$cnt;?>"><?=$cnt;?>台</option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <input type="hidden" class="ttl option-ttl" name="options_ttl[<?=$sub_item['idx'];?>]" value="<?=$sub_item['full_ttl'];?>" />
                                                                    <input type="hidden" class="cnt option-cnt" name="options_cnt[<?=$sub_item['idx'];?>]" value="0" />
                                                                    <input type="hidden" class="size option-size" name="options_size[<?=$sub_item['idx'];?>]" value="<?=$sub_item['size'];?>" />
                                                                    <input type="hidden" class="price option-price" name="options_price[<?=$sub_item['idx'];?>]" value="<?=$sub_item['price'];?>" />
                                                                </div>
                                                            </li>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <div class="item-name">
                                                        <?=$item['ttl'];?>
                                                        <select class="item-ctrl num">
                                                            <?php for ($cnt = 0; $cnt <= 50; $cnt++) : ?>
                                                            <option value="<?=$cnt;?>"><?=$cnt;?>台</option>
                                                            <?php endfor; ?>
                                                        </select>
                                                        <input type="hidden" class="ttl option-ttl" name="options_ttl[<?=$item['idx'];?>]" value="<?=$item['ttl'];?>" />
                                                        <input type="hidden" class="cnt option-cnt" name="options_cnt[<?=$item['idx'];?>]" value="0" />
                                                        <input type="hidden" class="size option-size" name="options_size[<?=$item['idx'];?>]" value="<?=$item['size'];?>" />
                                                        <input type="hidden" class="price option-price" name="options_price[<?=$item['idx'];?>]" value="<?=$item['price'];?>" />
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endfor; ?>
                                    </table>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <div class="date-select-content select-content" style="display: none;">
                    <div class="select-body">
                        <p class="select-body-ttl ttl-blue-wide">お引越要望日</p>

                        <div class="select-calendar">
                            <div id="calendar"></div>
                            <input id="date" type="hidden" name="date" value="" />
                        </div>

                        <div class="select-time">
                            <p>時　間　帯　：　</p>
                            <label style="margin-right: 20px;">
                                <input type="radio" name="time" value="am" checked />
                                <span>　午　前</span>
                            </label>
                            <label>
                                <input type="radio" name="time" value="pm" />
                                <span>　午　後</span>
                            </label>
                        </div>

                        <p class="select-body-ttl ttl-blue-wide">お問い合わせ・要望</p>

                        <div class="select-message">
                            <textarea rows="4" name="message"></textarea>
                        </div>
                    </div>
                </div>

                <div class="confirm-select-content select-content" style="display: none;">
                    <div class="select-body">
                        <p class="select-body-ttl ttl-blue-wide">入力内容の確認</p>
                        <p class="select-overview">
                            <span class="small right">この度のお客様の<br class="br-768-no">家財Lv.は</span>
                            <span class="large" id="calc-total-confirm">0</span>
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
                                    <td id="confirm-addr-current" class="lng"></td>
                                </tr>
                                <tr>
                                    <td class="sht">転居先</td>
                                    <td id="confirm-addr-target" class="lng"></td>
                                </tr>
                            </table>
                        </div>

                        <p class="select-body-ttl ttl-blue-wide">選んだ家財</p>
                        <div class="select-info-table">
                            <table id="confirm-good-table">
                            </table>
                        </div>

                        <p class="select-body-ttl ttl-blue-wide">オプション</p>
                        <div class="select-info-table">
                            <table id="confirm-option-table">
                            </table>
                        </div>

                        <p class="select-body-ttl ttl-blue-wide">お引越予定日</p>
                        <div class="select-info-date-wrapper">
                            <p id="select-info-date" class="select-info-date"></p>
                        </div>

                        <p class="select-body-ttl ttl-blue-wide">お問い合わせ・ご要望</p>
                        <div class="select-message">
                            <textarea rows="4" name="message_confirm" readonly></textarea>
                        </div>
                    </div>
                </div>

                <div class="price-select-content select-content" style="display: none;">
                    <div class="select-body">
                        <p class="select-body-ttl ttl-blue-wide">お見積り金額</p>
                        <p class="select-overview">
                            <span class="small right">この度のお客様の<br class="br-768-no">家財Lv.は</span>
                            <span class="large" id="calc-total-confirm-02">0</span>
                            <span class="medium">立米</span>
                            <span class="small">です。</span>
                        </p>
                    </div>
                    <div class="price-body">
                        <p class="ttl-blue-wide ttl-blue-wide-full">お引越料金（税込）</p>
                        <div class="price-wrapper">
                            <p class="price">
                                <span id="price_total_head"></span>円～
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
                                        <span id="price_good"></span>
                                        <input type="hidden" name="price_good" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>オプション</td>
                                    <td>
                                        <span id="price_option"></span>
                                        <input type="hidden" name="price_option" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>消費税</td>
                                    <td>
                                        <span id="price_tax"></span>
                                        <input type="hidden" name="price_tax" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>合計金額</td>
                                    <td>
                                        <span id="price_total"></span>
                                        <input type="hidden" name="price_total" value="" />
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
                </div>

                <div class="bottom-btn-list">
                    <button type="button" class="btn btn-back">戻る</button>
                    <button type="button" class="btn btn-default">オプションの選択</button>
                    <button type="button" class="btn btn-clear">クリア</button>
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

    <script src="./libs/moment/moment.min.js"></script>
    <script src="./libs/fullcalendar/main.js"></script>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/flow.js"></script>
    <script src="./assets/js/address/address.js"></script>
    <script src="./assets/js/address/prefectureCity.js"></script>
    <script src="./assets/js/goods/goods.js"></script>
    <script src="./assets/js/date/date.js"></script>
</body>
</html>