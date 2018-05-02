<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 2018/4/27
 * Time: 13:41
 */

function isAliOrWx()
{
    //判断是不是微信
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        return "Weixin";
    }
    //判断是不是支付宝
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false) {
        return "Alipay";
    }
    //哪个都不是
    return false;
}