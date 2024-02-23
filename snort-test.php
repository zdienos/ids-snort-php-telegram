<?php

// $telegramchatid = "863397096"; //gugus
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

$signature = $argv[1];
$timestamp = $argv[2];
$ip_src = baseLong2IP($argv[3]);
$ip_dst = baseLong2IP($argv[4]);
$ip_proto = get_protocol($argv[5]);

$caption = "❗️[$signature] Serangan dari $ip_src pada $ip_dst \n menggunakan protocol $ip_proto \n pada 🕔$timestamp";
telegram($caption);

//signatures, '" "', timestmp, '" "', ip_src, '" "', ip_dst, '" "', ip_proto, '"'))

//INSERT INTO `acid_event` (`sid`, `cid`, `signature`, `sig_name`, `sig_class_id`, `sig_priority`, `timestamp`, `ip_src`, `ip_dst`, `ip_proto`, `layer4_sport`, `layer4_dport`) 
//                  VALUES ('1', '217',   '511',       'Snort Alert [1:10000001:1]', '31', '3', '2019-08-04 00:00:00', '3232239493', '3232239614', '1', NULL, NULL);
