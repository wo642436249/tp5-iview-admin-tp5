<?php

namespace app\common\model;

use \Firebase\JWT\JWT;

class Auth
{
    static protected $Adminkey = 'dsfj329.62556932dfhjksahfjjhfd';

    public static function AdminLoginAuth($id)
    {
        $nowtime = time();
        $token = [
            'iss' => 'http://www.dahuawulitou.xyz', //签发者
            'aud' => 'http://www.dahuawulitou.xyz', //jwt所面向的用户
            'iat' => $nowtime, //签发时间
            'nbf' => $nowtime, //在什么时间之后该jwt才可用
            'exp' => $nowtime + 60 * 60 * 2, //过期时间-10min
            'data' => [
                'id' => $id
            ]
        ];
        $jwt = JWT::encode($token, self::$Adminkey);
        $res['data']['token'] = $jwt;
        $res['data']['id'] = $id;
        $res['code'] = 200;
        $res['message'] = '登陆成功！';
        $res['aaa'] = JWT::decode($jwt, self::$Adminkey, array('HS256'));
        return $res;
    }

    public static function Analysis($token)
    {
        try {
            $jwt_decode = JWT::decode($token, self::$Adminkey, array('HS256'));
            $data['data'] = (array)$jwt_decode;
            $data['code'] = 200;
            return $data;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {  //签名不正确
            return config('message.TOKEN_ABNORMAL');
        } catch (\Firebase\JWT\BeforeValidException $e) {  // 签名在某个时间点之后才能用
            return config('message.TOKEN_ABNORMAL');
        } catch (\Firebase\JWT\ExpiredException $e) {  // token过期
            return config('message.TOKEN_EXPIRED');
        } catch (Exception $e) {  //其他错误
            return config('message.NOT_NETWORK');
        }
    }
}
