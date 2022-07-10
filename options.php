<?php
include_once('./head.php');
include_once('./global.php');
?>

<body class="select select-02">
    <?php include_once('./header.php'); ?>

    <div class="wrap">
        <div class="content">
            <form action="./date.php" method="POST">
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
                    <p class="select-body-ttl ttl-blue-wide">オプション</p>

                    <div class="select-list">
                        <?php
                        for ($i = 0; $i < count($options); $i++) :
                            $option = $options[$i];
                        ?>
                        <div class="select-item">
                            <p class="select-item-head"><?=$option['ttl'];?></p>
                            <div class="select-item-body">
                                <table>
                                    <?php
                                    for ($j = 0; $j < count($option['items']); $j++) :
                                        $item = $option['items'][$j];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php if (count($item['items'])) : ?>
                                                <div class="item-name">
                                                    <?=$item['ttl'];?>
                                                    <span class="select-size" data-target="sub-item-<?=$i;?><?=$j;?>">サイズ選択</span>
                                                </div>
                                                <ul id="sub-item-<?=$i;?><?=$j;?>" class="sub-item-list">
                                                    <?php
                                                    for ($k = 0; $k < count($item['items']); $k++) :
                                                        $sub_item = $item['items'][$k];
                                                        $class = (($k % 2) != 0) ? 'gray' : '';
                                                    ?>
                                                        <li class="<?=$class;?>">
                                                            <div class="item-name">
                                                                <?=$sub_item['ttl'];?>
                                                                <p class="item-ctrl">
                                                                    <span class="num">0</span>台
                                                                    <span class="up"></span>
                                                                    <span class="dn"></span>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    <?php endfor; ?>
                                                </ul>
                                            <?php else: ?>
                                                <div class="item-name">
                                                    <?=$item['ttl'];?>
                                                    <p class="item-ctrl">
                                                        <span class="num">0</span>台
                                                        <span class="up"></span>
                                                        <span class="dn"></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </table>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="bottom-btn-list">
                    <button type="button" class="btn btn-back" onclick="history.back()">戻る</a>
                    <button type="submit" class="btn btn-default">お引越要望日の選択</button>
                    <button type="button" class="btn btn-clear">クリア</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/goods/goods.js"></script>
</body>
</html>