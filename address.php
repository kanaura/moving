<?php
session_start();

// $page_ttl = '住所の選択 | 株式会社ハコビズ';
$page_ttl = '住所の選択 | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
?>

<body class="address">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="main-figure">
                <img src="./assets/img/main.png" alt="" />
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

                    <button type="submit" class="btn-default">家財の内容を入力する</button>

                    <div class="address-lead">
                        <p class="address-lead-head">
                            現地見積り【愛媛県内のみ】をご希望の方は<br class="br-480-no">コチラからお問い合わせください。
                        </p>
                        <div class="address-lead-body">
                            <div class="address-lead-btn-list">
                                <a class="address-lead-btn" href="">お電話でお問い合わせ</a>
                                <a class="address-lead-btn" href="">メールでお問い合わせ</a>
                            </div>
                            <p class="txt txt-has-star address-lead-txt">
                                お見積り日程を調整後、ご自宅にお伺いして<br class="br-768-no">お見積りさせていただきます。
                            </p>
                        </div>
                        <div class="address-lead-deco">
                            <img src="./assets/img/address/lead-deco.png" alt="" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/address/address.js"></script>
    <script src="./assets/js/address/prefectureCity.js"></script>
</body>
</html>