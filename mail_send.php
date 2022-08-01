<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

//言語と文字コードを設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$mailto  = 'aketchi.07@gmail.com';
$option  = 'From:<info@hacovice.com>';

$title   = 'お引越しの仮お申し込み入りました';
$message = '非対面カンタンお見積りシステムより仮お申し込みを受け付けました。\n\n';
$message .= '[お客様情報]';
$message .= '引越の種類：' . $_POST['final_moving_type'] . '\n';
$message .= 'お名前：' . $_POST['final_name'] . '\n';
$message .= 'ふりがな：' . $_POST['final_gana'] . '\n';
$message .= '電話番号：' . $_POST['final_tel'] . '\n';
$message .= 'メールアドレス：' . $_POST['final_email'] . '\n';
$message .= '現住所：\n';
$message .= $_POST['final_post_code_01'] . '\n';
$message .= $_POST['final_addr_01_01'] . '　' . $_POST['final_addr_01_02'] . '\n';
$message .= $_POST['final_addr_01_type'] . '\n';
$message .= '転居先：\n';
$message .= $_POST['final_post_code_02'] . '\n';
$message .= $_POST['final_addr_02_01'] . '　' . $_POST['final_addr_02_02'] . '\n';
$message .= $_POST['final_addr_02_type'] . '\n';
$message .= 'ご連絡方法：' . $_POST['final_contact_method'] . '\n\n';

mb_send_mail($mailto, $title, $message, $option);