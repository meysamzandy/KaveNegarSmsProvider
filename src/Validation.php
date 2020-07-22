<?php

namespace MeysamZnd\KaveNegarSmsProvider;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Env\Url;
use Illuminate\Support\Facades\Config;
use MeysamZnd\KaveNegarSmsProvider\Interfaces\Sms;
use MeysamZnd\KaveNegarSmsProvider\Helper\Reusable;

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
