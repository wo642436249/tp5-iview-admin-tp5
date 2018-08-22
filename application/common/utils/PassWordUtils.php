<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23 0023
 * Time: 17:11
 */

namespace app\common\utils;


class PassWordUtils
{
    public static function password($password)
    {
        return md5($password);
    }
}
