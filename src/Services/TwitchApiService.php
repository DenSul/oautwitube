<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 22.04.18
 * Time: 14:35
 */

namespace densul\oautwitube\Services;

use GuzzleHttp\Exception\ClientException;
use densul\oautwitube\twitch\API\Authentication,
    densul\oautwitube\twitch\API\BaseApi,
    densul\oautwitube\twitch\API\Users,
    densul\oautwitube\twitch\API\Streams;

class TwitchApiService extends BaseApi
{
    /**
     * @return string
     */

    public function AuthenticationURL()
    {
        $authenticationAPI = new Authentication();
        return $authenticationAPI->authenticationURL();
    }
    /**
     * @param $code
     * @return mixed
     * @throws \Exception
     */

    public function RequestToken($code)
    {
        $authenticationAPI = new Authentication();
        return $authenticationAPI->requestToken($code);
    }

    /**
     * @param $username
     * @return \densul\oautwitube\twitch\API\json
     */

    public function User($username)
    {
        $usersAPI = new Users();
        return $usersAPI->user($username);
    }

    /**
     * @param null $token
     * @return \densul\oautwitube\twitch\API\json
     */

    public function AuthenticatedUser($token = null)
    {
        $token    = $this->getToken($token);
        $usersAPI = new Users($token);

        return $usersAPI->authenticatedUser();
    }

    /**
     * @param $game
     * @param $language
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */

    public function getStreams($game, $language)
    {
        $streams = new Streams();
        return $streams->getStreamsInGame($game, $language);
    }
}