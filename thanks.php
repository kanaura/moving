<?php

// $page_ttl = '住所の選択 | 株式会社ハコビズ';
$page_ttl = '住所の選択 | 株式会社ハコビス';

include_once('./head.php');
?>

<body class="home">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="main-figure">
                <img src="./assets/img/main.png" alt="" />
            </div>
            <div class="lead">
                <p style="margin: 0 0 20px; font-size: 28px; font-weight: bold; text-align: center;">
                    本当にありがとうございました！
                </p>
                <p style="margin: 0 0 60px; margin: 0 0 20px; font-size: 18px; font-weight: normal; text-align: center;">
                    仮お申し込みありがとうございます。<br>
                    担当者より、あらためてご連絡させていただきますので、<br>
                    今しばらくお待ちください。
                </p>
            </div>
            <a class="btn-default" href="./address.php">ホームページへ</a>
        </div>
    </div>

    <div id="popup" class="popup">
        <div id="popup-bg" class="popup-bg"></div>
        <div class="popup-body">
            <p class="popup-body-ttl">お見積り、仮お申し込みまでのカンタン4ステップ</p>
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
                    　　　　　　　「仮お申し込み」。
                </p>
                <p class="popup-block-txt">
                    ご入力いただいた情報からお見積り金額の<br>
                    概算が表示されます。<br>
                    ご確認後、「お客様情報」を入力して<br>
                    「仮お申し込み」ボタンを押して完了です。。<br>
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