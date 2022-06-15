<?php
include_once('./head.php');
?>

<?php
$infos = [
    [
        'ttl'   => '家　電　設　置',
    ], 
    [
        'ttl'   => '家具設置',
    ], 
    [
        'ttl'   => 'エアコンクリーニング',
    ], 
    [
        'ttl'   => 'リサイクル処分',
    ], 
    [
        'ttl'   => 'マットレス処分',
    ], 
    [
        'ttl'   => '不用品回収',
    ], 
    [
        'ttl'   => 'エリア外対応',
    ], 
    [
        'ttl'   => '4階以上作業',
    ], 
]
?>
<body class="select select-01">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
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
                        <span>10</span>立米
                    </p>
                </div>
            </div>

            <div class="select-body">
                <p class="select-body-ttl">家財の選択</p>

                <div class="select-list">
                    <?php for ($i = 0; $i < count($infos); $i++) : ?>
                    <div class="select-item">
                        <p class="select-item-head"><?=$infos[$i]['ttl'];?></p>
                        <div class="select-item-body">
                            <table>
                                <tr>
                                    <th>
                                        <img src="./assets/img/select/object-01.png" alt="" />
                                    </th>
                                    <td>
                                        冷蔵庫
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <img src="./assets/img/select/object-02.png" alt="" />
                                    </th>
                                    <td>
                                        洗濯機
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <img src="./assets/img/select/object-03.png" alt="" />
                                    </th>
                                    <td>
                                        レンジ
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="bottom-btn-list">
                <a class="btn btn-back" href="./select-01.php">戻る</a>
                <a class="btn btn-default" href="./select-date.php">お引越要望日の選択</a>
                <a class="btn btn-clear" href="">クリア</a>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>