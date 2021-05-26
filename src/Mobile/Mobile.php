<?php


namespace WYH\EsignSdk\Mobile;


use WYH\EsignSdk\Core\AbstractApi;

class Mobile extends AbstractApi
{
    /**
     * 发送签署短信验证码
     *
     * @param $accountId
     * @return mixed|null
     * @throws \Exception
     */
    public function sendCode($accountId)
    {
        $url = '/tech-sdkwrapper/timevale/mobile/sendCode';

        $params = [
            'accountId' => $accountId
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 发送签署语言验证码
     *
     * @param $accountId
     * @return mixed|null
     * @throws \Exception
     */
    public function sendVoiceCode($accountId)
    {
        $url = '/tech-sdkwrapper/timevale/mobile/sendVoiceCode';

        $params = [
            'accountId' => $accountId
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 指定手机发送签署短信验证码
     *
     * @param $accountId
     * @param $mobile
     * @return mixed|null
     * @throws \Exception
     */
    public function send3rdCode($accountId, $mobile)
    {
        $url = '/tech-sdkwrapper/timevale/mobile/send3rdCode';

        $params = [
            'accountId' => $accountId,
            'mobile'    => $mobile
        ];

        return $this->parseJSON('json', [$url, $params]);
    }
}
