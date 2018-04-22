<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 22.04.18
 * Time: 14:02
 */

namespace densul\oautwitube\twitch\API;

use GuzzleHttp\Client;

class BaseApi
{
    /** @var  null */
    protected $token;
    /** @var  GuzzleClient */
    protected $client;

    /**
     * BaseApi constructor.
     * @param null $token
     */

    public function __construct($token = null)
    {
        if ( $token )
            $this->setToken($token);

        $this->client = new Client([
            'base_url'  => config('oautwitube-api.Twitch.api_url'),
            'defaults' => [
                'headers' => ['Accept' => 'application/vnd.twitchtv[v3]+json']
            ]
        ]);
    }

    /**
     * @return null|string
     */

    public function getToken($token = null)
    {
        if ( $token )
            $this->token = $token;

        return $this->token;
    }

    /**
     * @param string $token
     */

    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param $type
     * @param $url
     * @param $token
     * @return \GuzzleHttp\Message\Request|\GuzzleHttp\Message\RequestInterface
     */

    protected function createRequest($type, $url, $token)
    {
        return $this->client->createRequest($type, $url, $this->getDefaultHeaders($token));
    }

    /**
     * @param null $token
     * @return array
     */

    protected function getDefaultHeaders($token = null)
    {
        $headers = [
            'headers' => [
                'Accept' => 'application/vnd.twitchtv.v3+json'
            ]
        ];

        if ( $token != null )
            $headers['headers']['Authorization'] = 'OAuth ' . $token;


        return $headers;
    }


}