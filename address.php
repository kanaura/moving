<?php
include_once('./head.php');
?>

<body class="address">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="main-figure">
                <img src="./assets/img/main.png" alt="" />
            </div>

            <div class="address-content">
                <div class="address-select-block">
                    <p class="address-select-block-ttl">現住所</p>
                    <div class="address-select-wrapper">
                        <select>
                            <option>都道府県を選択</option>
                            <option>北海道</option>
                        </select>
                    </div>
                    <div class="address-select-wrapper">
                        <select>
                            <option>市町村を選択</option>
                            <option>北海道</option>
                        </select>
                    </div>
                </div>

                <div class="address-select-block">
                    <p class="address-select-block-ttl">転居先</p>
                    <div class="address-select-wrapper">
                        <select>
                            <option>都道府県を選択</option>
                            <option>北海道</option>
                        </select>
                    </div>
                    <div class="address-select-wrapper">
                        <select>
                            <option>市町村を選択</option>
                            <option>北海道</option>
                        </select>
                    </div>
                </div>

                <p class="txt txt-has-star txt-case-no-address">
                    選択肢に現住所・転居先が表示されていない場合は別途お見積もりとなりますので<br>
                    下記よりお問い合わせください
                </p>

                <a class="btn-default" href="./select-01.php">家財の内容を入力する</a>

                <div class="address-lead">
                    <p class="address-lead-head">
                        現地見積り【愛媛県内のみ】をご希望の方は<br>
                        コチラからお問い合わせください。
                    </p>
                    <div class="address-lead-body">
                        <div class="address-lead-btn-list">
                            <a class="address-lead-btn" href="">お電話でお問い合わせ</a>
                            <a class="address-lead-btn" href="">メールでお問い合わせ</a>
                        </div>
                        <p class="txt txt-has-star address-lead-txt">
                            お見積り日程を調整後、ご自宅にお伺いして<br>
                            お見積りさせていただきます。
                        </p>
                    </div>
                    <div class="address-lead-deco">
                        <img src="./assets/img/address/lead-deco.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>