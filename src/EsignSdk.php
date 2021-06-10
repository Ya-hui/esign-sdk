<?php

namespace WYH\EsignSdk;

use Pimple\Container;
use WYH\EsignSdk\Account\Account;
use WYH\EsignSdk\Core\Http;
use WYH\EsignSdk\Mobile\Mobile;
use WYH\EsignSdk\Seal\Seal;
use WYH\EsignSdk\ServiceProviders\AccountProvider;
use WYH\EsignSdk\ServiceProviders\Config;
use WYH\EsignSdk\ServiceProviders\MobileProvider;
use WYH\EsignSdk\ServiceProviders\SealProvider;
use WYH\EsignSdk\ServiceProviders\SignFlowProvider;
use WYH\EsignSdk\SignFlow\SignFlow;

/**
 * Class EsignSdk
 *
 * @property SignFlow $signFlow
 * @property Account $account
 * @property Mobile $mobile
 * @property Seal $seal
 * @package WYH\EsignSdk
 */
class EsignSdk extends Container
{
    protected $providers = [
        AccountProvider::class,
        MobileProvider::class,
        SealProvider::class,
        SignFlowProvider::class
    ];

    public function __construct(array $config = array())
    {
        parent::__construct();

        $this['config'] = function () use ($config) {
            return new Config($config);
        };

        $this->registerProviders();

        Http::setDefaultOptions($this['config']->get('guzzle', ['timeout' => 5.0, 'base_uri' => $this['config']->get('base_uri')]));

    }

    public function addProvider($provider)
    {
        array_push($this->providers, $provider);
        return $this;
    }

    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    public function __get($id)
    {
        return $this->offsetGet($id);
    }
}
