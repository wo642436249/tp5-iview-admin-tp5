<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23 0023
 * Time: 16:38
 */

namespace app\common\enums;


class ErrorCode
{
    // +----------------------------------------------------------------------
    // | 系统级错误码
    // +----------------------------------------------------------------------
    const NOT_NETWORK = ['code' => 500, 'message' => '网络错误'];

    // +----------------------------------------------------------------------
    // | 用户数据交互码
    // +----------------------------------------------------------------------
    const PARMETER_ERROR = ['code' => 403, 'message' => '提交参数异常'];
    const NOT_USERNAME_PASS = ['code' => 401, 'message' => '用户名或密码错误'];
    const NOT_AUTH = ['code' => 401, 'message' => '没有权限'];
    const ACCOUNT_ERROR = ['code' => 403, 'message' => '账号异常'];
    const TOKEN_EXPIRED = ['code' => 401, 'message' => '签名过期，请重新登陆'];
    const TOKEN_ABNORMAL = ['code' => 401, 'message' => '签名异常，请重新登陆'];
    const Upload_ERROR = ['code' => 201, 'message' => '上传失败'];

    // +----------------------------------------------------------------------
    // | 数据操作交互码
    // +----------------------------------------------------------------------
    const DEL_ERROR = ['code' => 404, 'message' => '删除失败'];
}
