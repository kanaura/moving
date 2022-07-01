<?php
include_once('./head.php');
?>

<body class="select select-infos select-price">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <div class="select-body">
                <p class="select-body-ttl ttl-blue-wide">お見積り金額</p>
                <p class="select-overview">
                    <span class="small right">この度のお客様の<br>家財Lv.は</span>
                    <span class="large">10</span>
                    <span class="medium">立米</span>
                    <span class="small">です。</span>
                </p>

                <div class="price-body">
                    <p class="ttl-blue-wide ttl-blue-wide-full">お引越料金（税込）</p>
                    <div class="price-wrapper">
                        <p class="price">
                            <span>20000</span>円～
                        </p>
                    </div>
                    <div class="price-table">
                        <table>
                            <tr>
                                <th>明細</th>
                                <th>料金</th>
                            </tr>
                            <tr>
                                <td>基本料金</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>オプション</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>消費税</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>高速料金</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>合計金額</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                    <div class="attention">
                        <p class="attention-head">注意事項</a>
                        <div class="attention-body">
                            <div class="attention-txt">
                                ・旧居もしくはご新居が4階以上のマンションの場合、別途料金となります。<br>
                                ・ご家財や間取りにより、窓吊り作業等の特殊作業が発生した場合は別途料金となります。<br>
                                ・お運びするご家財に高価品（目安：購入時30万円以上）がある場合はお申込み内容確認のお打合せ時に当社受付担当者より確認をさせていただきます。<br>
                                ・火薬類、化学薬品類、石油・灯油類の揮発油製品などの危険物や燃料が入った状態の原付・バイク・ストーブ等も取扱い不可能品目となります。<br>
                                ・現金、貴金属等の貴重品につきましてはお客さまにて管理をお願いします。<br>
                                ・お申込内容、料金等の確認のため、後ほど当社受付担当者よりお電話させていただきます。<br>
                                  当社担当者とお打合せ後、本契約となりますので、ご了承くださいませ。<br><br>
                                  
                                上記注意事項とその他注意事項の詳細に関してはこちらをご確認いただき<br>
                                「同意いたしました」にチェックを入れてください。
                            </div>
                            <div class="attention-agree">
                                <div class="chk-wrapper">
                                    <input id="chk-agree" type="checkbox">
                                    <label for="chk-agree">同意いたします。</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-btn-list">
                <a class="btn btn-back" href="./select-date.php">戻る</a>
                <a class="btn btn-default" href="./final.php">お引越要望日の選択</a>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>