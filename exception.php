<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

$page_ttl = '非対応の地域 | 株式会社ハコビズ';
include_once('./head.php');
include_once('./global.php');
?>

<?php
?>

<body class="select select-01">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <form action="./others.php" method="POST">
                <div class="main-figure">
                    <img src="./assets/img/main.png" alt="" />
                </div>

                <p class="txt warning-txt">
                    大変申し訳ございません。お客様の現住所・転居先は「非対面カンタンお見積りシステム」でのご案内できません。<br>
                    下の「見積りを申し込む」ボタンよりお見積りをお申し込みください。後ほど受付担当者よりご連絡させていただきます。
                </p>

                <div class="bottom-btn-list">
                    <a type="button" class="btn btn-back" href="./address.php">戻る</a>
                    <button type="submit" class="btn btn-default">見積りを申し込む</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>