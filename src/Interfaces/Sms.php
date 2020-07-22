<?php

namespace MeysamZnd\KaveNegarSmsProvider\Interfaces;

interface Sms
{
    /**
     * @param string $url
     * @param array $data
     * @return array
     */
    public function send(string $url, array $data): array;
}
