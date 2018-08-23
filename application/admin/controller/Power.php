<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\AdminRoleRule;
use app\admin\model\AdminRule;

class Power extends Controller
{
    /**
     * Explain:获取角色所有的操作树形菜单数据
     * User: 徐涵诚
     * Date: 2018/8/15 0015
     * Time: 13:53
     * @param $id
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function read($id)
    {
        $roleRule = AdminRoleRule::where('role_id', $id)->field('rule_id')->find();
        $roleRuleList = explode(',', $roleRule['rule_id']);
        $rule = AdminRule::order('listorder', 'asc')->all();
        $ruleList = $rule->toArray();
        $data = userSubtree($ruleList, $roleRuleList);
        return json($data);
    }

    /**
     * Explain:修改角色权限
     * User: 徐涵诚
     * Date: 2018/8/15
     * Time: 16:30
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function save()
    {
        $data = request()->post();
        $role_id = $data['role_id'];
        $rule_arr = $data['rule_arr'];
        $rules = implode(',', $rule_arr);
        $roleRule = AdminRoleRule::where('role_id', $role_id)->find();
        if ($roleRule) {
            $roleRule->rule_id = $rules;
            $roleRule->save();
        } else {
            AdminRoleRule::create(['role_id' => $role_id, 'rule_id' => $rules]);
        }
        return json(config('message.EDIT_SUCCEED'));
    }
}
