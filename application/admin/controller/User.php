<?php

namespace app\admin\controller;

use app\admin\model\AdminUser;
use think\Controller;
use app\common\enums\ErrorCode;
use app\common\enums\SucceedCode;

class User extends Controller
{
    /**
     * Explain:获取所有后台用户
     * User: 徐涵诚
     * Date: 2018/8/7
     * Time: 14:21
     */
    public function index()
    {
        $data = AdminUser::all();
        $users = $data->hidden(['password'])->toArray();
        return json($users);
    }

    /**
     * Explain:获取用户详细信息
     * User: 徐涵诚
     * Date: 2018/8/7
     * Time: 13:41
     * @param string token 客户端发送的token值
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function read($id)
    {
        $user = AdminUser::get($id);
        $user_info = $user->hidden(['password'])->toArray();
        $role = $user->AdminRoleRule;
        $user_info['role'] = explode(',', $role['rule_id']);
        $data['data'] = $user_info;
        $data['code'] = 200;
        return json($data);
    }

    /**
     * Explain:新增管理员
     * User: 徐涵诚
     * Date: 2018/8/17
     * Time: 10:19
     * @return \think\response\Json
     */
    public function save()
    {
        $data = request()->post('params');
        $user = AdminUser::create($data);
        if ($user) {
            return json(SucceedCode::ADD_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }

    public function update()
    {
        $data = request()->put('params');
        $menu = AdminUser::update($data);
        if ($menu) {
            return json(SucceedCode::EDIT_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }

    /**
     * Explain:删除管理员
     * User: 徐涵诚
     * Date: 2018/8/17
     * Time: 10:25
     * @param $id
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function delete($id)
    {
        $menu = AdminUser::destroy($id);
        if ($menu) {
            return json(SucceedCode::DEL_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }
}
