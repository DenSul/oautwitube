<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 23.07.2018
 * Time: 9:31
 */

namespace densul\oautwitube;

use densul\oautwitube\Services\TwitchApiService,
    densul\oautwitube\Services\YoutubeApiService,
    densul\oautwitube\Services\SteamApiService,
    Illuminate\Support\Manager;

class OautwitubeManager extends Manager implements Contracts\Factory
{

    public function with($driver)
    {
        return $this->driver($driver);
    }

    /**
     * @return TwitchApiService
     */

    protected function createTwitchDriver()
    {
        return new TwitchApiService();
    }

    /**
     * @return YoutubeApiService
     */

    protected function createYoutubeDriver()
    {
        return new YoutubeApiService();
    }

    /**
     * @return SteamApiService
     */

    protected function createSteamDriver()
    {
        return new SteamApiService();
    }

    /**
     * @return string|void
     * @throws \InvalidArgumentException
     */

    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('Не выбран никакой драйвер');
    }
}