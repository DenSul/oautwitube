<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 23.07.2018
 * Time: 8:43
 */


namespace densul\oautwitube\Facades;

use Illuminate\Support\Facades\Facade,
    densul\oautwitube\Contracts\Factory;

class OautwitubeServiceFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return Factory::class; }
}