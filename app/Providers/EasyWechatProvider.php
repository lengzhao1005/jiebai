<?php

namespace App\Providers;

use EasyWeChat\Factory;
use Illuminate\Support\ServiceProvider;

class EasyWechatProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('EasyWechatOfficial', function(){
            return Factory::officialAccount([
                'app_id' => config('weixin.appId'),//wxd554e6eef059216c
                'secret' => config('weixin.secret'),//5113592c045e613d21384dd23228c139

                'oauth' => [
                    'scopes'   => ['snsapi_userinfo'],
                    'callback' => '/auth-callback',
                ],
                // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
                'response_type' => 'array',

                'log' => [
                    'level' => 'debug',
                ]
            ]);
        });
    }
}
