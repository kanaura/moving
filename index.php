<?php
$page_ttl = '株式会社ハコビス';

include_once('./head.php');
?>

<body class="home">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="main-figure">
                <img src="./assets/img/main.png" alt="" />
            </div>
            <a class="btn-default" href="./form.php">お見積りスタート</a>
            <div id="btn-lead" class="btn-lead">お見積り、仮申込までの流れ</div>
            <div class="lead">
                <p class="txt txt-has-star">
                    インターネットの通信環境によっては都道府県を選択後、自動で市区町村が表示されない場合がございます。その場合、お手数ですが都道府県を選択後、少し時間をおいてから市区町村を選択して下さい。
                </p>
                <p class="txt txt-has-star">
                    旧居もしくはご新居が4階以上のマンション)の場合、別途料金となります。
                </p>
                <p class="txt txt-has-star">
                    ご家財や間取りにより、窓吊り作業等の特殊作業が発生した際は別途料金となります。
                </p>
                <p class="txt txt-has-star">
                    現住所、転居先が離島の場合はオペレーター対応となりますので、<br>下部フリーダイヤルボタン、お問い合わせボタンより、お電話、メールにてお問い合わせ下さい。<br>(受付時間AM8:00～PM5:00　水曜日定休日)までお電話ください。
                </p>
            </div>
        </div>
    </div>

    <div id="popup" class="popup">
        <div id="popup-bg" class="popup-bg"></div>
        <div class="popup-body">
            <p class="popup-body-ttl">お見積り、仮申込までの<br class="br-992">カンタン4ステップ</p>
            <div class="popup-block">
                <p class="popup-block-ttl">1.「現住所」と「転居先」を選択。</p>
                <p class="popup-block-txt">
                    現住所と転居先の「都道府県」「市町村」を選択。
                </p>
            </div>
            <div class="popup-block">
                <p class="popup-block-ttl">2.「お運びする家財」と「オプション」を選択。</p>
                <p class="popup-block-txt mb-20">
                    お運びする家財をリスト内から選んで個数を入力。
                    <span>リスト内に家財がない場合は「フリー入力欄」に家財名・サイズ（縦・横・高さ）を入力。</span>
                </p>
                <p class="popup-block-txt">
                    オプションをリストから選択。
                    <span>リスト以外のオプションも承っておりますので、リストにない場合は<br>「ご要望欄」にご記入ください。<br>追ってお見積りさせていただきます。</span>
                </p>
            </div>
            <div class="popup-block">
                <p class="popup-block-ttl">3.「引越希望日」を選択。</p>
                <p class="popup-block-txt">
                    カレンダー内のご希望日・時間帯を選択。
                </p>
            </div>
            <div class="popup-block">
                <p class="popup-block-ttl">
                    4.「お見積り金額」の確認▶︎<br>
                    　　　　　　　「仮申込」。
                </p>
                <p class="popup-block-txt">
                    ご入力いただいた情報からお見積り金額の<br>
                    概算が表示されます。<br>
                    ご確認後、「お客様情報」を入力して<br>
                    「仮申込」ボタンを押して完了です。。<br>
                    追って、弊社より折り返しご連絡させていただきます。
                </p>
            </div>
            <div class="popup-figure">
                <img src="./assets/img/home/popup.svg" alt="" />
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>