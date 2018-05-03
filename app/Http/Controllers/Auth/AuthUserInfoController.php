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
        //判断打开的app（目前支持微信和支付宝）
        if(isAliOrWx()==='Weixin') $this->authType = 'Weixin';
    }

    /*
     * 获取用户信息（回调之前）
     */
    public function getUserInfo()
    {
        if($this->authType ==='Alipay'){//支付宝

            $alipay_obj = new AlipayAuth();
            return $alipay_obj->redirect();

        }else{//微信
            return app('EasyWechatOfficial')->oauth->redirect();
        }
    }

    /*
     * auth_callback
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
        //将授权信息转化为待插入数据
        $insertdata = $this->UserInfoToInsertData($user_info);

        //更新或插入数据，
        $user = $authRepository->saveOrUpdateAuthUserInfo($insertdata,$this->authType);

        //存入session
        session(['web_user'=>$user]);

        //判断是否绑定手机号，没有这跳转到绑定界面
        //if(empty($user->telephone)) return redirect()->route('bindPhone');

        $redirect_url = session('want_redirect_url')??'/';
        return redirect($redirect_url);
    }

    /**
     * @param $user_info
     * @return array
     */
    protected function UserInfoToInsertData($user_info)
    {
        switch ($this->authType){
            case 'Weixin':
                $insertdata['wx_openid'] = $user_info['openid'];
                $insertdata['nickname'] = $user_info['nickname'];
                $insertdata['gender'] = $user_info['sex'];
                $insertdata['avatar'] = $user_info['headimgurl'];
                $insertdata['city'] = $user_info['city'];
                $insertdata['province'] = $user_info['province'];
            break;
            case 'Alipay';
                $insertdata['user_status'] = $user_info->user_status;
                $insertdata['is_mobile_auth'] = $user_info->is_mobile_auth;
                $insertdata['gender'] = $user_info->gender;
                $insertdata['province'] = $user_info->province;
                $insertdata['city'] = $user_info->city;
                $insertdata['is_licence_auth'] = $user_info->is_licence_auth;
                $insertdata['avatar'] = $user_info->avatar;
                $insertdata['is_certify_grade_a'] = $user_info->is_certify_grade_a;
                $insertdata['is_student_certified'] = $user_info->is_student_certified;
                $insertdata['user_type_value'] = $user_info->user_type_value;
                $insertdata['is_bank_auth'] = $user_info->is_bank_auth;
                $insertdata['is_id_auth'] = $user_info->is_id_auth;
                $insertdata['ali_user_id'] = $user_info->ali_user_id;
                $insertdata['alipay_user_id'] = $user_info->alipay_user_id;
            break;
        }

        return $insertdata;
    }

}
