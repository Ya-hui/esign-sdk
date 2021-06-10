<?php


namespace WYH\EsignSdk\SignFlow;


use WYH\EsignSdk\Core\AbstractApi;

class SignFlow extends AbstractApi
{
    /**
     * 平台用户PDF摘要多位置签署
     *
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fpaas_sdk%2Faxponh&namespace=opendoc%2Fpaas_sdk&page=NDLFy
     * @param $accountId
     * @param $signType
     * @param $sealData
     * @param array $file
     * @param array $signPosList
     * @return false|mixed|null
     * @throws \Exception
     */
    public function multiPositionSign($accountId, $signType, $sealData, array $file, array $signPosList)
    {
        $url    = '/tech-sdkwrapper/timevale/sign/userMultiPositionSign';

        foreach ($signPosList as &$value) {
            if ($signType === 'Key') {
                if (empty($value['key'])) {
                    throw new \Exception('当为关键字定位时，关键词不能为空');
                }
                $value['posType'] = 1;
            } else {
                $value['posType'] = 0;
            }
        }
        $params = [
            'accountId'   => $accountId,
            'signType'    => $signType,
            'sealData'    => $sealData,
            'file'        => $file,
            'signPosList' => $signPosList
        ];

        return $this->parseJSON('json', [$url, $params]);
    }
}