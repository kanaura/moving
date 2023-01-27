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

if (isset($_POST['price_good'])) {
    $_SESSION['price_good'] = $_POST['price_good'];
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

if (isset($_POST['date'])) {
    $_SESSION['date'] = $_POST['date'];
}

if (isset($_POST['time'])) {
    $_SESSION['time'] = $_POST['time'];
}

if (isset($_POST['message'])) {
    $_SESSION['message'] = $_POST['message'];
}
?>

<body class="final form">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <p class="form-page-ttl">お客様情報を入力ください。</form>
            <form action="./mail_send.php" method="POST" enctype="multipart/form-data">
                <div class="form-list">
                    <div class="form-row">
                        <div class="form-item-name bold required">
                            <p>引越の種類</p>
                        </div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" name="final_moving_type" value="一戸建て" required />一戸建て</label>
                            <label class="radio"><input type="radio" name="final_moving_type" value="単身引越" required />単身引越</label>
                            <label class="radio"><input type="radio" name="final_moving_type" value="ファミリー" required />ファミリー</label>
                            <label class="radio"><input type="radio" name="final_moving_type" value="その他" required />その他</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold required">
                            <p>お名前</p>
                        </div>
                        <div class="form-item-group full">
                            <input type="text" name="final_name" value="" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">
                            <p>ふりがな</p>
                        </div>
                        <div class="form-item-group full">
                            <input type="text" name="final_gana" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold required">
                            <p>電話番号</p>
                            <span class="vertical">※半角　※ハイフンなし</span>
                        </div>
                        <div class="form-item-group full">
                            <input type="tel" name="final_tel" value="" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold required">
                            <p>メールアドレス</p>
                            <span class="vertical">※半角</span>
                        </div>
                        <div class="form-item-group full">
                            <input type="email" name="final_email" value="" required />
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>現住所</span></p>
                        <div class="form-row">
                            <div class="form-item-name small required">
                                <p>郵便番号</p>
                            </div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" name="final_post_code_01" value="" required />
                                <a class="form-btn" href="https://www.post.japanpost.jp/zipcode/" target="blank">検索</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small required">
                                <p>住所</p>
                            </div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_01_01" value="" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">
                                <p>建物名</p>
                            </div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_01_02" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small required">
                                <p>建物種類</p>
                            </div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" name="final_addr_01_type" value="一戸建て" required />一戸建て</label>
                                <label class="radio"><input type="radio" name="final_addr_01_type" value="マンション" required />マンション</label>
                                <label class="radio"><input type="radio" name="final_addr_01_type" value="アパート・コーポ" required />アパート・コーポ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>転居先</span></p>
                        <div class="form-row">
                            <div class="form-item-name small required">
                                <p>郵便番号</p>
                            </div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" name="final_post_code_02" value="" required />
                                <a class="form-btn" href="https://www.post.japanpost.jp/zipcode/" target="blank">検索</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small required">
                                <p>住所</p>
                            </div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_02_01" value="" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">
                                <p>建物名</p>
                            </div>
                            <div class="form-item-group">
                                <input type="text" name="final_addr_02_02" value="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small required">
                                <p>建物種類</p>
                            </div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" name="final_addr_02_type" value="一戸建て" required />一戸建て</label>
                                <label class="radio"><input type="radio" name="final_addr_02_type" value="マンション" required />マンション</label>
                                <label class="radio"><input type="radio" name="final_addr_02_type" value="アパート・コーポ" required />アパート・コーポ</label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="form-item-name bold required">
                            <p>ご連絡方法</p>
                        </div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" name="final_contact_method" value="電話" required />電話</label>
                            <label class="radio"><input type="radio" name="final_contact_method" value="メール" required />メール</label>
                            <label class="radio"><input type="radio" name="final_contact_method" value="LINE" required />LINE</label>
                            <label class="radio"><input type="radio" name="final_contact_method" value="その他" required />その他</label>
                        </div>
                    </div>

                    <p class="form-desc">
                        LINEでのご連絡をご希望の方はコチラから「ハコビス公式LINE」を友達登録していただき、フルネームでお名前を入力して送信をお願いします。
                    </p>
                    <a href="https://lin.ee/Arq7MBy"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>

                    <hr>

                    <div class="form-row">
                        <div class="form-item-name bold">
                            <p>
                                添付画像
                            </p>
                            <span class="vertical" style="margin-top: 0;">※10MB以内</span>
                        </div>
                        <div class="form-item-group full">
                            <p class="form-desc no-star">
                                可能であれば家財の写真を添付して送っていただけますと幸いです。
                            </p>
                            <div class="form-item-image">
                                <input id="kazai-image" type="file" name="photo" onChange="imgPreView(event)" />
                            </div>
                            <div id="preview"></div>
                        </div>
                    </div>
                </div>

                <div class="bottom-btn-list">
                    <button type="submit" class="btn btn-default">仮申し込みする</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script>
        function imgPreView(event) {
            event.preventDefault();

            var file = event.target.files[0];
            console.log(event.target.files[0].size);
            if (event.target.files[0].size > (1024 * 1024 * 10)) {
                // event.targets.value = "";
                $('#kazai-image').val('');
                alert('画像は10MB以内でアップロードしてください！');
                return;
            }
            var reader = new FileReader();
            var preview = document.getElementById("preview");
            var previewImage = document.getElementById("previewImage");
            
            if (previewImage != null) {
                preview.removeChild(previewImage);
            }
            
            reader.onload = function(event) {
                var img = document.createElement("img");
                img.setAttribute("src", reader.result);
                img.setAttribute("id", "previewImage");
                preview.appendChild(img);
            };
            
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>