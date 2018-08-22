<?php

namespace app\admin\model;

use think\Model;

class AdminRole extends Model
{
    public function roleRules()
    {
        return $this->hasMany('AdminRoleRule', 'role_id', 'id');
    }
}
