<?php

namespace App\Handlers;

use App\Models\Wxplatform;
use EasyWeChat\Factory;

class WechatConfigHandler
{
    public $default_appid='';
    //[1-1]微信公众号设置
    public function app_config($appid)
    {
        if(!isset($appid) ||empty($appid)) $appid = $this->default_appid;

        $wechat = Wxplatform::where('appid',$appid)->first();
        if (!$wechat) {
            return $config = [];
        }
        $config = [
            'app_id'      => $wechat->app_id,      // AppID
            'secret'      => $wechat->appsecret,      // AppSecret
            /*'token'   => $wechat->wechat_token,       // Token
            'aes_key' => $wechat->wechat_aes_key,     // EncodingAESKey，兼容与安全模式下请一定要填写！！！*/
            'response_type' => 'array',
            'oauth'   => [
                //'scopes'   => array_map('trim', explode(',', env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_SCOPES', 'snsapi_userinfo'))),
                'scopes'   => 'snsapi_userinfo',
                //'callback' => env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/oauth_callback'),
                'callback' => '/auth-callback/'.$appid,
            ],
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),  //这个必须要有，要不调试有问题，你都会找不到原因
            ],
        ];
        return $config;
    }

    //[1-2]生成微信公众号相关
    public function app($appid='')
    {
        $app = Factory::officialAccount($this->app_config($appid));
        return $app;
    }

    //[2-1]微信支付设置
    public function pay_config($appid='')
    {
        $wechat = Wxplatform::where('aid',$appid)->first();
        if (!$wechat) {
            return $config = [];
        }
        $config = [
            'app_id'      => $wechat->app_id,      // AppID
            'secret'      => $wechat->appsecret,      // AppSecret
            'mch_id'      => $wechat->mchid,
            'key'         => $wechat->key,   // API 密钥
            // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
            'cert_path'   => $wechat->pay_api_key, // XXX: 绝对路径！！！！
            'key_path'    => $wechat->pay_api_key,      // XXX: 绝对路径！！！！
            'notify_url'  => '默认的订单回调地址',     // 你也可以在下单时单独设置来想覆盖它
        ];
        return $config;
    }

    //[2-2]生成微信支付相关
    public function pay($appid)
    {
        $pay = Factory::payment($this->pay_config($appid));
        return $pay;
    }

    //[3-1]微信小程序设置
    public function mini_config($appid)
    {
        $wechat = Wechat::where('aid',$appid)->first();
        if (!$wechat) {
            return $config = [];
        }
        $config = [
            'app_id'  => $wechat->wechat_app_id,         // AppID
            'secret'  => $wechat->wechat_secret,     // AppSecret
            'response_type' => 'array',
        ];
        return $config;
    }

    //[3-2]微信小程序相关
    public function miniProgram($appid)
    {
        $miniProgram = Factory::miniProgram($this->mini_config($appid));
        return $miniProgram;
    }

    //[4-1]微信开放平台设置参数
    public function opconfig($appid)
    {
        $wechat = Wechat::where('aid',$appid)->first();
        if (!$wechat) {
            return $config = [];
        }
        $config = [
            'app_id'   => $wechat->op_app_id,
            'secret'   => $wechat->op_secret,
            'token'    => $wechat->op_token,
            'aes_key'  => $wechat->op_aes_key
        ];
        return $config;
    }

    //[4-2]微信开放平台相关
    public function openPlatform($appid)
    {
        $openPlatform = Factory::openPlatform($this->opconfig($appid));
        return $openPlatform;
    }

    //[5-1]微信企业号设置参数
    public function workconfig($appid)
    {
        $wechat = Wechat::where('aid',$appid)->first();
        if (!$wechat) {
            return $config = [];
        }
        $config = [
            'corp_id'   => $wechat->work_corp_id,
            'agent_id'   => $wechat->work_agent_id,
            'secret'    => $wechat->work_secret,

            'response_type' => 'array',
        ];
        return $config;

    }

    //[5-2]微信企业号相关
    public function work($appid)
    {
        $work = Factory::work($this->workconfig($appid));
        return $work;
    }
}