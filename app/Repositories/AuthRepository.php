<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 2018/4/26
 * Time: 10:04
 */

namespace App\Repositories;


use App\Models\Aliuser;
use App\Models\Wxuser;

class AuthRepository
{
    /**
     * @param array $user_info
     * @param string $auth_type
     * @return object
     */
    public function saveOrUpdateAuthUserInfo(array $user_info,string $auth_type)
    {
        if($auth_type=='Alipay'){
            $db_user_info = Aliuser::where('ali_user_id',$user_info['ali_user_id'])->first();
            $db_user = new Aliuser();

        }else{
            $db_user_info = Wxuser::where('wx_openid',$user_info['wx_openid'])->first();
            $db_user = new Wxuser();
        }

        if(empty($db_user_info)) {

            $user = $db_user_info->update($user_info);

        }else{

            if($auth_type=='Weixin') $user_info['created_datetime'] = date('Y-m-d H:i:s');

            $user = $db_user->create($user_info);
        }
        $user->auth_type = $auth_type;

        return $user;
    }
}