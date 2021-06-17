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
     * @param string $regType
     * @param $arr array
     * @return mixed|null
     * @throws \Exception
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fpaas_sdk%2Frd5o81&namespace=opendoc%2Fpaas_sdk
     */
    public function createOrganizeAccount($name, $organCode, string $regType = 'NORMAL', array $arr = [])
    {
        $url = '/tech-sdkwrapper/timevale/account/addOrganize';

        $params = [
                'name'      => $name,
                'organCode' => $organCode,
                'regType'   => $regType
            ] + $arr;

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 根据证件号查询账户ID
     *
     * @param $idNumber
     * @param $idType
     * @return false|mixed|null
     * @throws \Exception
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fpaas_sdk%2Fxoc3h2&namespace=opendoc%2Fpaas_sdk
     */
    public function getAccountInfoByIdNo($idNumber, $idType)
    {
        $url = '/tech-sdkwrapper/timevale/account/getAccountInfoByIdNo';

        $params = [
            'idNo'     => $idNumber,
            'idNoType' => $idType
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 注销账户
     *
     * 注销账户，注销后账户将不可再使用，请谨慎调用。
     *
     * @param $accountId
     * @return false|mixed|null
     * @throws \Exception
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fpaas_sdk%2Fvtv9yp&namespace=opendoc%2Fpaas_sdk
     */
    public function delete($accountId)
    {
        $url = '/tech-sdkwrapper/timevale/account/delete';

        $params = [
            'accountId' => $accountId,
        ];

        return $this->parseJSON('json', [$url, $params]);
    }
}
