<?php


namespace WYH\EsignSdk\ServiceProviders;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use WYH\EsignSdk\SignFlow\SignFlow;

class SignFlowProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['signFlow'] = function ($pimple) {
            return new SignFlow($pimple['config']);
        };
    }
}