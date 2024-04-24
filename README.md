# PHP push notification send library

This library allows you to send push notifications to your apps that are published on appdb.

More information about appdb push notification service can be found on [Documentation website](https://rtfm.dbservices.to/#/services-and-features/push-notifications)

## Installation

```
composer require appdb/php-attest-validator
```

## Sending of push notification (sample code)

```injectablephp
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
```
