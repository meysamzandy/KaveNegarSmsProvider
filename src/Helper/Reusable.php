<?php

namespace MeysamZnd\KaveNegarSmsProvider\Helper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Reusable
{
    /**
     * @param string $url
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function request(string $url, array $data): array
    {
        $baseUrl = 'https://api.kavenegar.com/v1/'.$url;
        try {
            $client = new Client();
            $request = $client->post($baseUrl, ['form_params' => $data]);
            $response = [
                'status' => true,
                'providerResult' => json_decode($request->getBody()->getContents(), true),
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'providerResult' => $e->getMessage(),
            ];
        }

        return $response;
    }
}
