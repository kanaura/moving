<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

// $page_ttl = '見積もりを申し込む | 株式会社ハコビズ';
$page_ttl = '見積もりを申し込む | 株式会社ハコビス';// (2022.07.29 宮川更新)

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

                    <div class="form-block">
                        <p class="form-block-ttl"><span>現住所</span></p>
                        <div class="form-row">
                            <div class="form-item-name small">郵便番号</div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" />
                                <a class="form-btn" href="https://www.post.japanpost.jp/zipcode/" target="blank">検索</a>
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
                        <div class="form-row">
                            <div class="form-item-name small">エレベーター</div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" />あり</label>
                                <label class="radio"><input type="radio" />なし</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-block">
                        <p class="form-block-ttl"><span>転居先</span></p>
                        <div class="form-row">
                            <div class="form-item-name small">郵便番号</div>
                            <div class="form-item-group">
                                <input class="post-code" type="text" />
                                <a class="form-btn" href="https://www.post.japanpost.jp/zipcode/" target="blank">検索</a>
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
                        <div class="form-row">
                            <div class="form-item-name small">エレベーター</div>
                            <div class="form-item-group">
                                <label class="radio"><input type="radio" />あり</label>
                                <label class="radio"><input type="radio" />なし</label>
                            </div>
                        </div>
                    </div>

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
                        <div class="form-item-name bold">現在の間取り</div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" />1K</label>
                            <label class="radio"><input type="radio" />1DK</label>
                            <label class="radio"><input type="radio" />2DK</label>
                            <label class="radio"><input type="radio" />3DL</label>
                            <label class="radio"><input type="radio" />4DL</label>
                        </div>
                        <div class="form-item-group full">
                            <label class="radio"><input type="radio" />1LDK</label>
                            <label class="radio"><input type="radio" />2LDK</label>
                            <label class="radio"><input type="radio" />3LDK</label>
                            <label class="radio"><input type="radio" />4LDK以上</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item-name bold">お引越し要望日</div>
                        <div class="form-item-group full">
                            <label>
                                <input class="date-01" type="text" />
                                <span style="margin-left: 10px">年</span>
                            </label>
                            <label>
                                <input class="date-02" type="text" />
                                <span style="margin-left: 10px">月</span>
                            </label>
                            <label style="margin-right: 60px;">
                                <input class="date-02" type="text" />
                                <span style="margin-left: 10px">日</span>
                            </label>

                            <label class="radio"><input type="radio" />午前</label>
                            <label class="radio"><input type="radio" />午後</label>
                        </div>
                    </div>

                    <div class="form-row" style="margin-top: 40px;">
                        <div class="form-item-name bold">お問い合わせご要望</div>
                        <p class="form-desc" style="margin-bottom: 20px;">
                            下記項目に当てはまる場合は、要望欄にてお知らせください。<br>
                            現地、行先の建物が21階以上のタワーマンションの場合<br>
                            行先建物がご新築の場合<br>
                            建物の搬出搬入時間に制限がある場合<br>
                            特殊な作業が必要な場合（金庫・ピアノなど重量物がある場合など）
                        </p>
                        <div class="form-item-group full">
                            <textarea rows="10"></textarea>
                        </div>
                    </div>
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