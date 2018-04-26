<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 2018/4/25
 * Time: 16:01
 */

namespace App\Handlers\AliAuth;


use App\Handlers\AliAuth\Requests\AlipaySystemOauthTokenRequest;
use App\Handlers\AliAuth\Requests\AlipayUserInfoShareRequest;
use Cache;

class AlipayAuth extends AopClient
{
    /**
     * @var string
     */
    protected $tokenKey = 'access_token';

    /**
     * @var int
     */
    protected $safeSeconds = 5;

    /**
     * @var string
     */
    protected $cachePrefix = 'aliauth.access_token.';

    public function getAccessToken(bool $refresh = false)
    {

        $cacheKey = $this->getCacheKey();

        if (!$refresh && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $token = $this->requestToken();

        $this->setToken($token[$this->tokenKey], $token['expires_in'] ?? 300);

        return $token;
    }

    public function getUserInfo()
    {
        $access_token = $this->getAccessToken(true);

        $request = new AlipayUserInfoShareRequest();
        $result = $this->execute ( $request, $access_token[$this->tokenKey]);

        if(isset($result->error_response)){
            $this->_log(json_decode(json_encode($result->error_response),1));
            throw new \Exception("获取user_info出错，原因：".$result->error_response->sub_msg);
        }

        return $result->alipay_user_userinfo_share_response;

    }

    public function requestToken():array
    {
        $request = new AlipaySystemOauthTokenRequest();
        $request->setGrantType("authorization_code");
        $request->setCode($_GET['auth_code']);
        $result = $this->execute($request);

        if(isset($result->error_response)){
            $this->_log(json_decode(json_encode($result->error_response),1));
            throw new \Exception("获取access_token出错，原因：".$result->error_response->sub_msg);
        }

        $access_token = $result->alipay_system_oauth_token_response->access_token;

        return [$this->tokenKey=>$access_token];
    }

    public function setToken(string $token, int $lifetime = 300)
    {
        Cache::set($this->getCacheKey(), [
            $this->tokenKey => $token,
            'expires_in' => $lifetime,
        ], $lifetime - $this->safeSeconds);

        return $this;
    }

    /**
     * @return string
     */
    protected function getCacheKey()
    {
        return $this->cachePrefix.md5(config('alipay.appId'));
    }

    protected function _log(array $message)
    {
        $log = new \Monolog\Logger('aliauth');
        $logDir = storage_path('logs/ali/access_token');
        if (!is_dir($logDir)) mkdir($logDir, 0777, true);

        $log->pushHandler(new \Monolog\Handler\StreamHandler($logDir . '/' . date('Y-m-d') . '.log', \Monolog\Logger::ERROR));

        $log->error('error',$message);
    }
}