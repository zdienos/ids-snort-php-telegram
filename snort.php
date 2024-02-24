<?php

// $telegramchatid = "xsssxx"; 
// $telegrambot = "yyy:xsssxx";
$telegramchatid = "698990214"; //dino
$telegrambot = "6705155258:AAE3ZW2wH6o13wMYk99-lrJbBaePKDJE-A4";


function telegram($msg)
{
    global $telegrambot, $telegramchatid;
    $url = 'https://api.telegram.org/bot' . $telegrambot . '/sendMessage';
    $data = array('chat_id' => $telegramchatid, 'text' => $msg);
    $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

function get_protocol($proto)
{
    switch ($proto) {
        case 1:
            return "ICMP";
        case 6:
            return "TCP";
        case 17:
            return "UDP";
        case 255:
            return "RawIP";
        default:
            return "";
    }
}

function baseLong2IP($long_IP)
{
    $tmp_IP = $long_IP;
    if ($long_IP > 2147483647) {
        $tmp_IP = 4294967296 -  $tmp_IP;
        $tmp_IP = $tmp_IP * (-1);
    }

    $tmp_IP = long2ip($tmp_IP);
    return $tmp_IP;
}

// $signature = $_GET['signatures'];
// $timestamp = $_GET['timestamp'];
$timestamp = date('Y-m-d H-i:s');
$ip_src = baseLong2IP($_GET['ip_src']);
$ip_dst = baseLong2IP($_GET['ip_dst']);
$ip_proto = get_protocol($_GET['ip_proto']);

$caption = "🕔$timestamp\n⚡️Terjadi serangan dari IP:$ip_src ke IP:$ip_dst \n menggunakan protocol $ip_proto \n ";
telegram($caption);


//INSERT INTO `acid_event` (`sid`, `cid`, `signature`, `sig_name`, `sig_class_id`, `sig_priority`, `timestamp`, `ip_src`, `ip_dst`, `ip_proto`, `layer4_sport`, `layer4_dport`) 
//                  VALUES ('1', '217',   '511',       'Snort Alert [1:10000001:1]', '31', '3', '2019-08-04 00:00:00', '3232239493', '3232239614', '1', NULL, NULL);
