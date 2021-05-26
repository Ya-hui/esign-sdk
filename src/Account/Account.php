<?php


namespace WYH\EsignSdk\Account;


use WYH\EsignSdk\Core\AbstractApi;

class Account extends AbstractApi
{
    /**
     * 创建个人账户
     *
     * @param $name
     * @param $idNo
     * @return mixed|null
     * @throws \Exception
     */
    public function createPersonAccount($name, $idNo)
    {
        $url = '/tech-sdkwrapper/timevale/account/addPerson';

        $params = [
            'name' => $name,
            'idNo' => $idNo
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 创建机构账户
     *
     * @param $name
     * @param $organCode
     * @param $regType
     * @param $arr array
     * @return mixed|null
     * @throws \Exception
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fpaas_sdk%2Frd5o81&namespace=opendoc%2Fpaas_sdk
     */
    public function createOrganizeAccount($name, $organCode, $regType, $arr = [])
    {
        $url = '/tech-sdkwrapper/timevale/account/addOrganize';

        $params = [
            'name'      => $name,
            'organCode' => $organCode,
            'regType'   => $regType
        ] + $arr;

        return $this->parseJSON('post', [$url, $params]);
    }
}
