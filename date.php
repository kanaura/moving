<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

$page_ttl = 'お引越要望日の選択 | 株式会社ハコビズ';
include_once('./head.php');
?>

<body class="select select-date">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <form action="./confirm.php" method="POST">
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
                            <span id="calc-total"><?=$_SESSION['total_m3'];?></span>立米
                            <input id="total-base" type="hidden" name="total_base" value="<?=$_SESSION['total_cm3'];?>" />
                            <input id="total-m3" type="hidden" name="total" value="<?=$_SESSION['total_m3'];?>" />
                            <input id="total-cm3" type="hidden" name="total" value="<?=$_SESSION['total_cm3'];?>" />
                        </p>
                    </div>
                </div>

                <div class="select-body">
                    <p class="select-body-ttl ttl-blue-wide">お引越要望日</p>

                    <div class="select-calendar">
                        <table>
                            <tr>
                                <th>日</th>
                                <th>月</th>
                                <th>火</th>
                                <th>水</th>
                                <th>木</th>
                                <th>金</th>
                                <th>土</th>
                            </tr>
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php endfor; ?>
                        </table>
                    </div>

                    <p class="select-body-ttl ttl-blue-wide">お問い合わせ・要望</p>

                    <div class="select-message">
                        <textarea rows="10"></textarea>
                    </div>
                </div>

                <div class="bottom-btn-list">
                    <button type="button" class="btn btn-back" onclick="history.back()">戻る</button>
                    <button type="submit" class="btn btn-default">入力内容を確認</button>
                    <button type="button" class="btn btn-clear">クリア</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>