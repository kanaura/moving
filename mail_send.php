<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

//言語と文字コードを設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

function str_date($date)
{
    $date = date($date);
    return date('Y年m月d日 ', strtotime($date));
}

$message_common = "[お客様情報]\r\n";
$message_common .= "引越の種類：" . $_POST['final_moving_type'] . "\r\n";
$message_common .= "お名前：" . $_POST['final_name'] . "\r\n";
$message_common .= "ふりがな：" . $_POST['final_gana'] . "\r\n";
$message_common .= "電話番号：" . $_POST['final_tel'] . "\r\n";
$message_common .= "メールアドレス：" . $_POST['final_email'] . "\r\n";
$message_common .= "現住所：\r\n";
$message_common .= $_POST['final_post_code_01'] . "\r\n";
$message_common .= $_POST['final_addr_01_01'] . " " . $_POST['final_addr_01_02'] . "\r\n";
$message_common .= $_POST['final_addr_01_type'] . "\r\n";
$message_common .= "転居先：\r\n";
$message_common .= $_POST['final_post_code_02'] . "\r\n";
$message_common .= $_POST['final_addr_02_01'] . " " . $_POST['final_addr_02_02'] . "\r\n";
$message_common .= $_POST['final_addr_02_type'] . "\r\n";
$message_common .= "ご連絡方法：" . $_POST['final_contact_method'] . "\r\n\r\n";

$message_common .= "[お見積り内容]\r\n";
$message_common .= "お引越要望日：" . str_date($_SESSION['date']) . " " . (($_SESSION['time'] == "am") ? "午前" : "午後") . "\r\n";
$message_common .= "基本料金：" . $_SESSION['price_good'] . "円\r\n";
$message_common .= "オプション：" . $_SESSION['price_option'] . "円\r\n";
$message_common .= "消費税：" . $_SESSION['price_tax'] . "円\r\n";
$message_common .= "合計金額：" . $_SESSION['price_total'] . "円\r\n\r\n";

$message_common .= "[入力内容]\r\n";
$message_common .= "【家財】\r\n";
for ($i = 0; $i < count($_SESSION['goods_ttl']); $i++) {
    if ($_SESSION['goods_cnt'][$i] != 0) {
        $message_common .= $_SESSION['goods_ttl'][$i] . "：" . $_SESSION['goods_cnt'][$i] . "台\r\n";
    }
}

$message_common .= "【フリー】\r\n";
for ($i = 0; $i < count($_SESSION['free_ttl']); $i++) {
    if ($_SESSION['free_cnt'][$i] != 0) {
        $message_common .= $_SESSION['free_ttl'][$i] . "：(" . $_SESSION['free_w'][$i] . "cm・" . $_SESSION['free_h'][$i] . "cm・" . $_SESSION['free_d'][$i] . "cm)" . $_SESSION['free_cnt'][$i] . "台\r\n";
    }
}

$message_common .= "\r\n";
$message_common .= "【オプション】\r\n";
for ($i = 0; $i < count($_SESSION['options_ttl']); $i++) {
    if ($_SESSION['options_cnt'][$i] != 0) {
        $message_common .= $_SESSION['options_ttl'][$i] . "：" . $_SESSION['options_cnt'][$i] . "台\r\n";
    }
}
$message_common .= "\r\n";
$message_common .= "お問い合わせ：\r\n".$_SESSION['message'];

$message_common .= "\r\n";
$message_common .= "\r\n";

$mailto  = "info@hacovice.com";
$option  = "From:<info@hacovice.com>" . "\r\n";
$option  .= "Bcc:<info@sangodesign.jp>";

$title   = "お引越しの仮お申し込み入りました";
$message = "非対面カンタンお見積りシステムより仮お申し込みを受け付けました。\r\n\r\n";
$message = $message . $message_common;

if (!mb_send_mail($mailto, $title, $message, $option)) {
    // echo "送信失敗";
    header("Location: thanks.php?res=true");
    exit();
}

$mailto  = $_POST['final_email'];

$title   = "お引越しの仮お申し込みありがとうございます【株式会社ハコビス】";
$message = "※このメールは自動返信メールです。\r\n";
$message .= "この度は、株式会社ハコビスに\r\n";
$message .= "お引越しの仮お申し込みをいただき\r\n";
$message .= "誠にありがとうございます。\r\n\r\n";
$message .= "お申し込みいただい内容は次の通りです。\r\n";
$message .= "担当者より、あらためてご連絡させていただきますので、\r\n";
$message .= "今しばらくお待ちください。\r\n";
$message = $message . $message_common;

$message .= "\r\n";
$message .= "───────────────\r\n";
$message .= "株式会社 ハコビス\r\n";
$message .= "本社\r\n";
$message .= "〒791-1102\r\n";
$message .= "愛媛県松山市来住町1178-5\r\n";
$message .= "TEL 089-909-7720\r\n";
$message .= "FAX 089-993-5626\r\n\r\n";

$message .= "広島オフィス\r\n";
$message .= "〒730-0016\r\n";
$message .= "広島県広島市中区幟町13-15\r\n";
$message .= "新広島ビルディング 2階\r\n";
$message .= "TEL 082-512-2257\r\n\r\n";
$message .= "https://www.hacovice.com/company/\r\n";

$option  = "From:<info@hacovice.com>";

if (mb_send_mail($mailto, $title, $message, $option)) {
    // echo "送信成功";
    header("Location: thanks.php?res=true");
    exit();
} else {
    // echo "送信失敗";
    header("Location: thanks.php?res=false");
    exit();
}