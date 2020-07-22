<?php

namespace MeysamZnd\KaveNegarSmsProvider;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use MeysamZnd\KaveNegarSmsProvider\Interfaces\Sms;
use MeysamZnd\KaveNegarSmsProvider\Helper\Reusable;

class CallMessage implements Sms
{

    /**
     * @param string $akiKey
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function send(string $akiKey, array $data): array
    {
        $url = ($akiKey).'/call/maketts.json';
        return (new Reusable())->request($url, $data);

    }
}
