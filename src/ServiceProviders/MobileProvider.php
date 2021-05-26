<?php


namespace WYH\EsignSdk\ServiceProviders;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use WYH\EsignSdk\Mobile\Mobile;

class MobileProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['mobile'] = function ($pimple) {
            return new Mobile($pimple['config']);
        };
    }
}
