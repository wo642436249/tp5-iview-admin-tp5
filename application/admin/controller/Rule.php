<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\AdminRule;
use app\common\enums\ErrorCode;
use app\common\enums\SucceedCode;
use think\facade\Cache;

class Rule extends Controller
{
    /**
     * Explain:获取所有后台菜单
     * User: 徐涵诚
     * Date: 2018/8/9
     * Time: 8:36
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function index()
    {
        $data = Cache::get('AdminRule');
        if (!$data) {
            $data = AdminRule::order('listorder', 'asc')->all();
            $mens_data = $data->toArray();
            $data = subtree($mens_data);
            Cache::set('AdminRule', $data);
        }
        return json($data);
    }

    /**
     * Explain:新增菜单
     * User: 徐涵诚
     * Date: 2018/8/10
     * Time: 8:50
     * @param array pid父级菜单id listorder 菜单排序序号 title 标题
     * @return \think\response\Json
     */
    public function save()
    {
        $data = request()->post();
        $menu = AdminRule::create($data);
        if ($menu) {
            Cache::rm('AdminRule');
            return json(SucceedCode::ADD_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }

    /**
     * Explain:更新菜单
     * User: 徐涵诚
     * Date: 2018/8/10
     * Time: 9:34
     * @param array id 菜单id pid父级菜单id listorder 菜单排序序号 title 标题
     * @return \think\response\Json
     */
    public function update()
    {
        $data = request()->put();
        $menu = AdminRule::update($data);
        if ($menu) {
            Cache::rm('AdminRule');
            return json(SucceedCode::EDIT_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }

    /**
     * Explain: 删除菜单
     * User: 徐涵诚
     * Date: 2018/8/10
     * Time: 9:45
     * @param $id 菜单id
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function delete($id)
    {
        if (AdminRule::where('pid', $id)->find()) {
            return json(ErrorCode::DEL_ERROR);
        }
        $menu = AdminRule::destroy($id);
        if ($menu) {
            Cache::rm('AdminRule');
            return json(SucceedCode::DEL_SUCCEED);
        } else {
            return json(ErrorCode::NOT_NETWORK);
        }
    }
}
