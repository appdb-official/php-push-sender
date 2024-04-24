<?php

namespace Appdb\PhpPushSender;


class PhpPushSender
{

    public $appIdentifier;
    private $pushSendToken;
    const URI = 'https://pushrelay.dbservices.to/v1.0/send/';

    function __construct(string $pushSendToken, string $appIdentifier)
    {
        $this->appIdentifier = $appIdentifier;
        $this->pushSendToken = $pushSendToken;
    }

    function send(array $payload, array $destinations)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $client->post(self::URI, [
                'headers' => [ 'Authorization' => 'Bearer ' . $this->pushSendToken ],
                'json' => [
                    'app_id'=>$this->appIdentifier,
                    'payload' => $payload,
                    'destinations' => $destinations
                ]
            ]);
            return true;
        } catch (\Exception $e) {
            die('Exception during sending: ' . $e->getMessage());
        }
    }
}
