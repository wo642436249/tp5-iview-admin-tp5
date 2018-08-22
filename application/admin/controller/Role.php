<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\AdminRole;
use app\admin\model\AdminRoleRule;
use app\common\enums\ErrorCode;
use app\common\enums\SucceedCode;
use think\Db;

class Role extends Controller
{
    /**
     * Explain:后台权限列表
     * User: 徐涵诚
     * Date: 2018/8/10
     * Time: 14:21
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function index()
    {
        $list = AdminRole::order('listorder', 'asc')->all();
        return json($list);
    }

    /**
     * Explain:添加角色
     * User: 徐涵诚
     * Date: 2018/8/13
     * Time: 16:06
     * @return \think\response\Json
     */
    public function save()
    {
        $data = request()->post();
        $menu = AdminRole::create($data);
        if ($menu) {
            return json(SucceedCode::ADD_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }

    /**
     * Explain:更新角色
     * User: 徐涵诚
     * Date: 2018/8/13
     * Time: 16:26
     * @return \think\response\Json
     */
    public function update()
    {
        $data = request()->put();
        $menu = AdminRole::update($data);
        if ($menu) {
            return json(SucceedCode::EDIT_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }

    /**
     * Explain:删除角色
     * User: 徐涵诚
     * Date: 2018/8/13
     * Time: 16:06
     * @param $id
     * @return \think\response\Json
     */
    public function delete($id)
    {
        Db::startTrans();
        try {
            $menu1 = AdminRole::destroy($id);
            $menu2 = AdminRoleRule::where('role_id', $id)->delete();
            Db::commit();
            if ($menu1 && $menu2) {
                return json(SucceedCode::DEL_SUCCEED);
            } else {
                return json(ErrorCode::NOT_NETWORK);
            }
        } catch (\Exception $e) {
            Db::rollback();
            return json(ErrorCode::NOT_NETWORK);
        }
    }
}
