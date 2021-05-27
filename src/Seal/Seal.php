<?php


namespace WYH\EsignSdk\Seal;


use WYH\EsignSdk\Core\AbstractApi;

class Seal extends AbstractApi
{
    /**
     * 创建个人模板印章
     *
     * @param $accountId
     * @param $color
     * @param $templateType
     * @return mixed|null
     * @throws \Exception
     */
    public function addPersonSeal($accountId, $color, $templateType)
    {
        $url = '/tech-sdkwrapper/timevale/seal/addPersonSeal';

        $params = [
            'accountId'    => $accountId,
            'color'        => $color,
            'templateType' => $templateType
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 创建企业模板印章
     *
     * @param $accountId
     * @param $color
     * @param $templateType
     * @param $arr
     * @return mixed|null
     * @throws \Exception
     */
    public function addOrganizeSeal($accountId, $color, $templateType, $arr)
    {
        $url = '/tech-sdkwrapper/timevale/seal/addOrganizeSeal';

        $params = $arr + [
            'accountId'    => $accountId,
            'color'        => $color,
            'templateType' => $templateType
        ];

        return $this->parseJSON('json', [$url, $params]);
    }
}