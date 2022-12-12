<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

// $page_ttl = '仮申込をする | 株式会社ハコビズ';
$page_ttl = '仮申込をする | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
?>

<?php
if (isset($_POST['sel_pref_01'])) {
    $_SESSION['sel_pref_01'] = $_POST['sel_pref_01'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['sel_city_01'])) {
    $_SESSION['sel_city_01'] = $_POST['sel_city_01'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['sel_pref_02'])) {
    $_SESSION['sel_pref_02'] = $_POST['sel_pref_02'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['sel_city_02'])) {
    $_SESSION['sel_city_02'] = $_POST['sel_city_02'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['price_good'])) {
    $_SESSION['price_good'] = $_POST['price_good'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['total_m3'])) {
    $_SESSION['total_m3'] = $_POST['total_m3'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['total_cm3'])) {
    $_SESSION['total_cm3'] = $_POST['total_cm3'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['goods_ttl'])) {
    $_SESSION['goods_ttl'] = $_POST['goods_ttl'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['goods_cnt'])) {
    $_SESSION['goods_cnt'] = $_POST['goods_cnt'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['goods_size'])) {
    $_SESSION['goods_size'] = $_POST['goods_size'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['free_ttl'])) {
    $_SESSION['free_ttl'] = $_POST['free_ttl'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['free_cnt'])) {
    $_SESSION['free_cnt'] = $_POST['free_cnt'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['free_size'])) {
    $_SESSION['free_size'] = $_POST['free_size'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['free_w'])) {
    $_SESSION['free_w'] = $_POST['free_w'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['free_h'])) {
    $_SESSION['free_h'] = $_POST['free_h'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['free_d'])) {
    $_SESSION['free_d'] = $_POST['free_d'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['options_ttl'])) {
    $_SESSION['options_ttl'] = $_POST['options_ttl'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['options_cnt'])) {
    $_SESSION['options_cnt'] = $_POST['options_cnt'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['options_size'])) {
    $_SESSION['options_size'] = $_POST['options_size'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['options_price'])) {
    $_SESSION['options_price'] = $_POST['options_price'];
} else {
    header('Location: ' . './');
}



if (isset($_POST['price_option'])) {
    $_SESSION['price_option'] = $_POST['price_option'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['price_tax'])) {
    $_SESSION['price_tax'] = $_POST['price_tax'];
} else {
    header('Location: ' . './');
}

if (isset($_POST['price_total'])) {
    $_SESSION['price_total'] = $_POST['price_total'];
} else {
    header('Location: ' . './');
}
?>

<body class="final form">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <p class="form-page-ttl">お客様情報を入力ください。</form>
            <form action="./mail_send.php" method="POST">
                <div class="form-list">
                    <div class="form-row">
                        <div class="form-item-name bold">引越の種類</div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" name="final_moving_type" value="一戸建て" />一戸建て</label>
                            <label class="radio"><input type="radio" name="final_moving_type" value="単身引越" />単身引越</label>
                            <label class="radio"><input type="radio" name="final_moving_type" value="ファミリー" />ファミリー</label>
                            <label class="radio"><input type="radio" name="final_moving_type" value="その他" />その他</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">お名前</div>
                        <div class="form-item-group full">
                            <input type="text" name="final_name" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">ふりがな</div>
                        <div class="form-item-group full">
                            <input type="text" name="final_gana" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">電話番号<span class="vertical">※半角　※ハイフンなし</span></div>
                        <div class="form-item-group full">
                            <input type="tel" name="final_tel" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">メールアドレス<span>※半角</span></div>
                        <div class="form-item-group full">
                            <input type="email" name="final_email" value="" />
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>現住所</span></p>
                        <div class="form-row">
                            <div class="form-item-name small">郵便番号</div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" name="final_post_code_01" value="" />
                                <a class="form-btn" href="https://www.post.japanpost.jp/zipcode/" target="blank">検索</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">住所</div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_01_01" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物名</div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_01_02" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物種類</div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" name="final_addr_01_type" value="一戸建て" />一戸建て</label>
                                <label class="radio"><input type="radio" name="final_addr_01_type" value="マンション" />マンション</label>
                                <label class="radio"><input type="radio" name="final_addr_01_type" value="アパート・コーポ" />アパート・コーポ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>転居先</span></p>
                        <div class="form-row">
                            <div class="form-item-name small">郵便番号</div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" name="final_post_code_02" value="" />
                                <a class="form-btn" href="https://www.post.japanpost.jp/zipcode/" target="blank">検索</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">住所</div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_02_01" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物名</div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_02_02" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物種類</div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" name="final_addr_02_type" value="一戸建て" />一戸建て</label>
                                <label class="radio"><input type="radio" name="final_addr_02_type" value="マンション" />マンション</label>
                                <label class="radio"><input type="radio" name="final_addr_02_type" value="アパート・コーポ" />アパート・コーポ</label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="form-item-name bold">ご連絡方法</div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" name="final_contact_method" value="電話" />電話</label>
                            <label class="radio"><input type="radio" name="final_contact_method" value="メール" />メール</label>
                            <label class="radio"><input type="radio" name="final_contact_method" value="LINE" />LINE</label>
                            <label class="radio"><input type="radio" name="final_contact_method" value="その他" />その他</label>
                        </div>
                    </div>

                    <p class="form-desc">
                        LINEでのご連絡をご希望の方はコチラから「ハコビス公式LINE」を友達登録していただき、フルネームでお名前を入力して送信をお願いします。
                    </p>
                </div>

                <div class="bottom-btn-list">
                    <button type="submit" class="btn btn-default">仮申し込みする</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>