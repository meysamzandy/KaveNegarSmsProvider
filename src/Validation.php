<?php

namespace MeysamZnd\KaveNegarSmsProvider;

use GuzzleHttp\Exception\GuzzleException;
use MeysamZnd\KaveNegarSmsProvider\Helper\Reusable;
use MeysamZnd\KaveNegarSmsProvider\Interfaces\Sms;

class Validation implements Sms
{
    /**
     * @param string $akiKey
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function send(string $akiKey, array $data): array
    {
        $url = ($akiKey).'/verify/lookup.json';

        return (new Reusable())->request($url, $data);
    }
}
