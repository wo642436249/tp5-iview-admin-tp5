<?php

namespace app\admin\model;

use think\Model;
use app\common\utils\PassWordUtils;

class AdminUser extends Model
{
    public static function init()
    {
        self::event('before_insert', function ($user) {
            $user->password = PassWordUtils::password($user->password);
        });
    }

    public function AdminRoleRule()
    {
        return $this->hasOne('AdminRoleRule', 'role_id', 'role');
    }
}
