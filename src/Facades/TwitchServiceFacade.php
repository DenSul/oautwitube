<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 22.04.18
 * Time: 14:30
 */

namespace densul\oautwitube\Facades;

use densul\oautwitube\Services\TwitchApiService;
use Illuminate\Support\Facades\Facade;

class TwitchServiceFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'densul\oautwitube\Services\TwitchApiService'; }
}