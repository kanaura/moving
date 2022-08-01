<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

// $page_ttl = '仮申込をする | 株式会社ハコビズ';
$page_ttl = '仮申込をする | 株式会社ハコビス'; // (2022.07.29 宮川更新)

include_once('./head.php');
?>

<body class="final form">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <p class="form-page-ttl">お客様情報を入力ください。</form>
            <form>
                <div class="form-list">
                    <div class="form-row">
                        <div class="form-item-name bold">引越の種類</div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" />一戸建て</label>
                            <label class="radio"><input type="radio" />単身引越</label>
                            <label class="radio"><input type="radio" />ファミリー</label>
                            <label class="radio"><input type="radio" />その他</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">お名前</div>
                        <div class="form-item-group full">
                            <input type="text" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">ふりがな</div>
                        <div class="form-item-group full">
                            <input type="text" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">電話番号<span class="vertical">※半角　※ハイフンなし</span></div>
                        <div class="form-item-group full">
                            <input type="tel" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">メールアドレス<span>※半角</span></div>
                        <div class="form-item-group full">
                            <input type="tel" />
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>現住所</span></p>
                        <div class="form-row">
                            <div class="form-item-name small">郵便番号</div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" />
                                <div class="form-btn">検索</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">住所</div>
                            <div class="form-item-group">
                                <input type="text" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物名</div>
                            <div class="form-item-group">
                                <input type="text" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物種類</div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" />一戸建て</label>
                                <label class="radio"><input type="radio" />マンション</label>
                                <label class="radio"><input type="radio" />アパート・コーポ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>転居先</span></p>
                        <div class="form-row">
                            <div class="form-item-name small">郵便番号</div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" />
                                <div class="form-btn">検索</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">住所</div>
                            <div class="form-item-group">
                                <input type="text" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物名</div>
                            <div class="form-item-group">
                                <input type="text" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item-name small">建物種類</div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" />一戸建て</label>
                                <label class="radio"><input type="radio" />マンション</label>
                                <label class="radio"><input type="radio" />アパート・コーポ</label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="form-item-name bold">ご連絡方法</div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" />電話</label>
                            <label class="radio"><input type="radio" />メール</label>
                            <label class="radio"><input type="radio" />LINE</label>
                            <label class="radio"><input type="radio" />その他</label>
                        </div>
                    </div>

                    <p class="form-desc">
                        LINEでのご連絡をご希望の方はコチラから「ハコビス公式LINE」を友達登録していただき、フルネームでお名前を入力して送信をお願いします。
                    </p>
                </div>
            </form>

            <div class="bottom-btn-list">
                <a class="btn btn-default" href="./select-price.php">仮申し込みする</a>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>