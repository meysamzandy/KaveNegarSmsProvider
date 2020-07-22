<?php

namespace MeysamZnd\KaveNegarSmsProvider;

use MeysamZnd\KaveNegarSmsProvider\Interfaces\Sms;

class KaveNegarSmsProvider
{

    protected $send;

    /**
     * HostiranSmsProvider constructor.
     * @param Sms $send
     */
    public function __construct(Sms $send)
    {
        $this->send = $send;
    }

    /**
     * @param string $url
     * @param array $data
     * @return array
     */
    public function send(string $url, array $data): array
    {
        return $this->send->send($url, $data);
    }
}
