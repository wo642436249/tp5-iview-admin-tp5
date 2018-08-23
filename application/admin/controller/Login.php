<?php

namespace app\admin\controller;

use think\Controller;
use app\common\utils\PassWordUtils;
use app\admin\model\AdminUser;
use app\common\model\Auth;

class Login extends Controller
{
    public function index()
    {
        $username = request()->post('username');
        $password = request()->post('password');
        if (!$username || !$password) {
            return json(config('message.PARMETER_ERROR'));
        }
        try {
            $admin = AdminUser::where('username|mobile|email', $username)
                ->field('id,username,password,avatar,nickname,status')
                ->find();
            if (empty($admin) || PassWordUtils::password($password) != $admin->password) {
                return json(config('message.NOT_USERNAME_PASS'));
            }
            if ($admin->status != 1) {
                return json(config('message.ACCOUNT_ERROR'));
            }
            $res = Auth::AdminLoginAuth($admin->id, $username);
            $admin->last_login_ip = request()->ip();
            $admin->last_login_time = time();
            $admin->save();
            return json($res);
        } catch (Exception $e) {
            return json(config('message.NOT_NETWORK'));
        }
    }
}
