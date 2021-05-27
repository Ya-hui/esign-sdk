<?php


namespace WYH\EsignSdk\Core;


use WYH\EsignSdk\ServiceProviders\Config;
use WYH\EsignSdk\Support\Collection;

abstract class AbstractApi
{
    protected $http;

    public function __construct(Config $config)
    {
        // echo 1;
    }

    public function getHttp()
    {
        if (is_null($this->http)) {
            $this->http = new Http();
        }
        return $this->http;
    }

    /**
     * @throws \Exception
     */
    public function parseJSON($method, array $args)
    {
        $http = $this->getHttp();

        $contents = $http->parseJSON(call_user_func_array([$http, $method], $args));

        if (empty($contents)) {
            return null;
        }

        $this->checkAndThrow($contents);

        return $contents;
    }

    protected function checkAndThrow(array $contents)
    {
        if (isset($contents['errCode']) && 0 !== $contents['errCode']) {
            throw new \Exception($contents['msg'], $contents['errCode']);
        }
    }
}
