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

$mailto  = "aketchi.07@gmail.com";
$option  = "From:<info@hacovice.com>";

$title   = "お引越しの仮お申し込み入りました";
$message = "非対面カンタンお見積りシステムより仮お申し込みを受け付けました。\r\n\r\n";
$message .= "[お客様情報]\r\n";
$message .= "引越の種類：" . $_POST['final_moving_type'] . "\r\n";
$message .= "お名前：" . $_POST['final_name'] . "\r\n";
$message .= "ふりがな：" . $_POST['final_gana'] . "\r\n";
$message .= "電話番号：" . $_POST['final_tel'] . "\r\n";
$message .= "メールアドレス：" . $_POST['final_email'] . "\r\n";
$message .= "現住所：\r\n";
$message .= $_POST['final_post_code_01'] . "\r\n";
$message .= $_POST['final_addr_01_01'] . " " . $_POST['final_addr_01_02'] . "\r\n";
$message .= $_POST['final_addr_01_type'] . "\r\n";
$message .= "転居先：\r\n";
$message .= $_POST['final_post_code_02'] . "\r\n";
$message .= $_POST['final_addr_02_01'] . " " . $_POST['final_addr_02_02'] . "\r\n";
$message .= $_POST['final_addr_02_type'] . "\r\n";
$message .= "ご連絡方法：" . $_POST['final_contact_method'] . "\r\n\r\n";

$message .= "[お見積り内容]\r\n";
$message .= "お引越要望日：" . str_date($_SESSION['date']) . " " . (($_SESSION['time'] == "am") ? "午前" : "午後") . "\r\n";

mb_send_mail($mailto, $title, $message, $option);