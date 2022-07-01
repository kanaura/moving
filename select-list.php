<?php
include_once('./head.php');
?>

<body class="select select-infos select-list">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="select-body">
                <p class="select-body-ttl ttl-blue-wide">入力内容の確認</p>
                <p class="select-overview">
                    <span class="small right">この度のお客様の<br>家財Lv.は</span>
                    <span class="large">10</span>
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
                            <td class="lng"></td>
                        </tr>
                        <tr>
                            <td class="sht">転居先</td>
                            <td class="lng"></td>
                        </tr>
                    </table>
                </div>

                <p class="select-body-ttl ttl-blue-wide">選んだ家財</p>
                <div class="select-info-table">
                    <table>
                        <tr>
                            <td class="lng">冷蔵庫 [100L～200L 未満]</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">洗濯機 [4kgから8kg]</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">レンジ</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">エアコン</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">ストーブ</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">こたつ</td>
                            <td class="sht">1台</td>
                        </tr>
                    </table>
                </div>

                <p class="select-body-ttl ttl-blue-wide">オプション</p>
                <div class="select-info-table">
                    <table>
                        <tr>
                            <td class="lng">エアコンクリーニング</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">テレビ設置</td>
                            <td class="sht">1台</td>
                        </tr>
                        <tr>
                            <td class="lng">エリア外対応</td>
                            <td class="sht">1台</td>
                        </tr>
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
                <a class="btn btn-default" href="./select-price.php">お引越要望日の選択</a>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>