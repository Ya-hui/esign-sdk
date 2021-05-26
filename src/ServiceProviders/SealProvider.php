<?php


namespace WYH\EsignSdk\ServiceProviders;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use WYH\EsignSdk\Seal\Seal;

class SealProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['seal'] = function ($pimple) {
            return new Seal($pimple['config']);
        };
    }
}
