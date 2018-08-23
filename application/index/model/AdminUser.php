<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/20 0020
 * Time: 16:09
 */

namespace app\index\model;

use think\Model;


class AdminUser extends Model
{
    public function allUser()
    {
        return $this::all();
    }
}
