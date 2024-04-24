<?php

require_once 'vendor/autoload.php';

$sender = new \Appdb\PhpPushSender\PhpPushSender('push_xxx', 'xxx');


$payload = [
    'aps' => [
        'alert' => [
            'title' => 'test',
            'subtitle' => 'test notification',
            'body' => 'test at ' . date('r')
        ]
    ]
];

$destinations['c_xxx'] = []; // sending to this customer
// OR
$destinations['c_xxx'][] = 'd_xxx';  // sending to specific device of customer


$pushSendResult = $sender->send($payload, $destinations);

var_dump($pushSendResult);
