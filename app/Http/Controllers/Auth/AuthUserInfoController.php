<?php

namespace App\Http\Controllers\Auth;

use App\Handlers\AliAuth\AlipayAuth;
use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthUserInfoController extends Controller
{
    protected $authType='Alipay';

    public function __construct()
    {
        if(isAliOrWx()==='Weixin') $this->authType = 'Weixin';
    }

    /*
     * 获取用户信息
     */
    public function getUserInfo()
    {
        if($this->authType ==='Alipay'){

            $alipay_obj = new AlipayAuth();
            return $alipay_obj->redirect();

        }else{
            return app('EasyWechatOfficial')->oauth->redirect();
        }
    }

    /*
     * wxauth_callback
     */
    public function authCallback(AuthRepository $authRepository)
    {
        if($this->authType === 'Alipay'){

            $alipay_obj = new AlipayAuth();
            $user_info = $alipay_obj->getUserInfo();

        }else{
            $user_info = app('EasyWechatOfficial')->oauth->user()->getOriginal();
        }

dump($this->authType);
dd($user_info);

        $authRepository->saveOrUpdateAuthUserInfo($user_info,$this->authType);
        session(['web_user'=>$user_info]);

        $redirect_url = session('want_redirect_url')??'/';
        return redirect($redirect_url);
    }

    protected function aliAuthUserInfoToArray($user_info)
    {
        return [

        ];
    }

}
