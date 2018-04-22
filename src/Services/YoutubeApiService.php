<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 22.04.18
 * Time: 17:29
 */

namespace densul\oautwitube\Services;


use densul\oautwitube\Youtube\API\BaseApi,
    densul\oautwitube\Youtube\Api\Authentication,
    densul\oautwitube\Youtube\Api\Users,
    GuzzleHttp\Client;

class YoutubeApiService extends BaseApi
{
    /**
     * @return mixed
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

    public function requestToken($code)
    {
        $parameters = [
            'client_id'     => config('oautwitube-api.Youtube.client_id'),
            'client_secret' => config('oautwitube-api.Youtube.client_secret'),
            'redirect_uri'  => config('oautwitube-api.Youtube.redirect_url'),
            'code'          => $code,
            'grant_type'    => 'authorization_code'
        ];

        try {
            $client = new Client();

            $response = $client->post('https://www.googleapis.com/oauth2/v4/token', ['form_params' => $parameters]);
            $response = json_decode($response->getBody()->getContents(), true);

            if (isset($response['access_token']))
                return $response['access_token'];

        } catch (\Exception $e) {
            throw $e;
        }
    }



    public function AuthenticatedUser($token = null)
    {
        $token    = $this->getToken($token);
        $usersAPI = new Users($token);

        return $usersAPI->authenticatedUser();
    }
}