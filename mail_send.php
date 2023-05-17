<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

//言語と文字コードを設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$test = false;

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
$message_common .= "お引越要望日：" . str_date($_POST['date']) . " " . (($_POST['time'] == "am") ? "午前" : "午後") . "\r\n";
$message_common .= "基本料金：" . $_POST['price_good'] . "円\r\n";
$message_common .= "オプション：" . $_POST['price_option'] . "円\r\n";
$message_common .= "消費税：" . $_POST['price_tax'] . "円\r\n";
$message_common .= "合計金額：" . $_POST['price_total'] . "円\r\n\r\n";

$message_common .= "[入力内容]\r\n";
$message_common .= "【家財】\r\n";
for ($i = 0; $i < count($_POST['goods_ttl']); $i++) {
    if ($_POST['goods_cnt'][$i] != 0) {
        $message_common .= $_POST['goods_ttl'][$i] . "：" . $_POST['goods_cnt'][$i] . "台\r\n";
    }
}

$message_common .= "【フリー】\r\n";
for ($i = 0; $i < count($_POST['free_ttl']); $i++) {
    if ($_POST['free_cnt'][$i] != 0) {
        $message_common .= $_POST['free_ttl'][$i] . "：(" . $_POST['free_w'][$i] . "cm・" . $_POST['free_h'][$i] . "cm・" . $_POST['free_d'][$i] . "cm)" . $_POST['free_cnt'][$i] . "台\r\n";
    }
}

$message_common .= "\r\n";
$message_common .= "【オプション】\r\n";
for ($i = 0; $i < count($_POST['options_ttl']); $i++) {
    if ($_POST['options_cnt'][$i] != 0) {
        $message_common .= $_POST['options_ttl'][$i] . "：" . $_POST['options_cnt'][$i] . "台\r\n";
    }
}

if (isset($_POST['option_special_recycle']) && ($_POST['option_special_recycle'] == 1)) {
    $message_common .= "リサイクル処分：現地にてお見積り\r\n";
}

if (isset($_POST['option_special_useless']) && ($_POST['option_special_useless'] == 1)) {
    $message_common .= "不用品回収：現地にてお見積り\r\n";
}

if (isset($_POST['select_elevator_01']) && ($_POST['select_elevator_01'] == 0)) {
    if (isset($_POST['select_floor_01']) && ($_POST['select_floor_01'] != 0)) {
        $message_common .= "4階以上作業(引越し元)：";
        $floor = intval(($_POST['select_floor_01'] - 5000) / 2000) + 4;
        $message_common .= $floor . "階\r\n";
    }
}

if (isset($_POST['select_elevator_02']) && ($_POST['select_elevator_02'] == 0)) {
    if (isset($_POST['select_floor_02']) && ($_POST['select_floor_02'] != 0)) {
        $message_common .= "4階以上作業(引越し先)：";
        $floor = intval(($_POST['select_floor_02'] - 5000) / 2000) + 4;
        $message_common .= $floor . "階\r\n";
    }
}

$message_common .= "\r\n";
$message_common .= "お問い合わせ：\r\n".$_POST['message'];

$message_common .= "\r\n";
$message_common .= "\r\n";

if (!$test) {
    $mailto  = "info@hacovice.com";
} else {
    $mailto  = "user01@localhost.com";
}

$header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\r\n";
$header .= "Return-Path: " . $mailto . " \r\n";
if (!$test) {
    $header .= "From: <info@hacovice.com>" . "\r\n";
    $header .= "Sender: <info@hacovice.com>" . "\r\n";
    $header .= "Bcc: <info@sangodesign.jp>\r\n";
} else {
    $header .= "From: <user01@localhost.com>" . "\r\n";
    $header .= "Sender: <user01@localhost.com>" . "\r\n";
}
$header .= "Return-Path: " . $mailto . " \r\n";

$title   = "お引越しの仮申込入りました";
$message = "非対面カンタンお見積りシステムより仮申込を受け付けました。\r\n\r\n";
$message = $message . $message_common;

$body = "--__BOUNDARY__\r\n";
$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n\r\n";
$body .= $message . "\r\n";
$body .= "--__BOUNDARY__\r\n";

// if (!empty($_FILES['photo'])) {
//     if (($_FILES['photo']['name']!="")) {
//         $time_now = time();
//         $target_dir = "upload/" . $time_now . "/";
//         mkdir($target_dir);
//         $file = $_FILES['photo']['name'];
//         $path = pathinfo($file);
//         $filename = $path['filename'];
//         $ext = $path['extension'];
//         $temp_name = $_FILES['photo']['tmp_name'];
//         $path_filename_ext = $target_dir . $filename . "." . $ext;

//         move_uploaded_file($temp_name, $path_filename_ext);

//         $body .= "Content-Type: application/octet-stream; name=\"{$filename}.{$ext}\"\n";
//         $body .= "Content-Disposition: attachment; filename=\"{$filename}.{$ext}\"\n";
//         $body .= "Content-Transfer-Encoding: base64\n";
//         $body .= "\n";
//         $body .= chunk_split(base64_encode(file_get_contents($path_filename_ext)));
//         $body .= "--__BOUNDARY__\n";
//     }
// }

if (!mb_send_mail($mailto, $title, $body, $header)) {
    // echo "送信失敗";
    header("Location: thanks.php?res=true");
    exit();
}

$mailto  = $_POST['final_email'];

$header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\r\n";
$header .= "Return-Path: " . $mailto . " \r\n";
if (!$test) {
    $header .= "From: <info@hacovice.com>" . "\r\n";
    $header .= "Sender: <info@hacovice.com>" . "\r\n";
} else {
    $header .= "From: <user01@localhost.com>" . "\r\n";
    $header .= "Sender: <user01@localhost.com>" . "\r\n";    
}
$header .= "Return-Path: " . $mailto . " \r\n";

$title   = "お引越しの仮申込ありがとうございます【株式会社ハコビス】";
$message = "※このメールは自動返信メールです。\r\n";
$message .= "この度は、株式会社ハコビスに\r\n";
$message .= "お引越しの仮申込をいただき\r\n";
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

$body = "--__BOUNDARY__\r\n";
$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n\r\n";
$body .= $message . "\r\n";
$body .= "--__BOUNDARY__\r\n";

// if (!empty($_FILES['photo'])) {
//     if (($_FILES['photo']['name']!="")) {
//         $body .= "Content-Type: application/octet-stream; name=\"{$filename}.{$ext}\"\n";
//         $body .= "Content-Disposition: attachment; filename=\"{$filename}.{$ext}\"\n";
//         $body .= "Content-Transfer-Encoding: base64\n";
//         $body .= "\n";
//         $body .= chunk_split(base64_encode(file_get_contents($path_filename_ext)));
//         $body .= "--__BOUNDARY__\n";
//     }
// }

if (mb_send_mail($mailto, $title, $body, $header)) {
    // echo "送信成功";
    header("Location: thanks.php?res=true");
    exit();
} else {
    // echo "送信失敗";
    header("Location: thanks.php?res=false");
    exit();
}