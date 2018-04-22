<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 22.04.18
 * Time: 17:32
 */

namespace densul\oautwitube\Facades;

use densul\oautwitube\Services\YoutubeApiService;
use Illuminate\Support\Facades\Facade;

class YoutubeServiceFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'densul\oautwitube\Services\YoutubeApiService'; }
}