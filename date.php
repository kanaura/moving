<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

// $page_ttl = 'お引越要望日の選択 | 株式会社ハコビズ';
$page_ttl = 'お引越要望日の選択 | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
?>

<?php
if (!isset($_SESSION['sel_pref_01']) || !isset($_SESSION['sel_city_01']) || !isset($_SESSION['sel_pref_02']) || !isset($_SESSION['sel_city_02'])) {
    header('Location: ' . './');
}

if (isset($_POST['options_ttl'])) {
    $_SESSION['options_ttl'] = $_POST['options_ttl'];
}

if (isset($_POST['options_cnt'])) {
    $_SESSION['options_cnt'] = $_POST['options_cnt'];
}

if (isset($_POST['options_size'])) {
    $_SESSION['options_size'] = $_POST['options_size'];
}

if (isset($_POST['options_price'])) {
    $_SESSION['options_price'] = $_POST['options_price'];
}
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
                            <input id="total-m3" type="hidden" name="total_m3" value="<?=$_SESSION['total_m3'];?>" />
                            <input id="total-cm3" type="hidden" name="total_cm3" value="<?=$_SESSION['total_cm3'];?>" />
                        </p>
                    </div>
                </div>

                <div class="select-body">
                    <p class="select-body-ttl ttl-blue-wide">お引越要望日</p>

                    <div class="select-calendar">
                        <div id="calendar"></div>
                        <input id="date" type="hidden" name="date" value="" />
                    </div>

                    <div class="select-time">
                        <p>時　間　帯　：　</p>
                        <label style="margin-right: 20px;">
                            <input type="radio" name="time" value="am" />
                            <span>　午　前</span>
                        </label>
                        <label>
                            <input type="radio" name="time" value="pm" />
                            <span>　午　後</span>
                        </label>
                    </div>

                    <p class="select-body-ttl ttl-blue-wide">お問い合わせ・要望</p>

                    <div class="select-message">
                        <textarea rows="10" name="message"></textarea>
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
    <script src="./libs/moment/moment.min.js"></script>
    <script src="./libs/fullcalendar/main.js"></script>
    <script src="./assets/js/date/date.js"></script>
</body>
</html>