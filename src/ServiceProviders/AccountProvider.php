<?php

namespace WYH\EsignSdk\ServiceProviders;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use WYH\EsignSdk\Account\Account;

class AccountProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['account'] = function ($pimple) {
            return new Account($pimple['config']);
        };
    }
}
