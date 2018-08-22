<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23 0023
 * Time: 16:30
 */

namespace app\common\exception;

use think\Exception;

class JsonException extends Exception
{
    public function __construct($errcode, $errmsg = null)
    {
        if (is_array($errcode)) {
            $errmsg = isset($errcode['message']) && $errmsg == null ? $errcode['message'] : $errmsg;
            $errcode = isset($errcode['code']) ? $errcode['code'] : null;
        }
        \Exception::__construct($errmsg, $errcode);
    }
}
