<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/10 0010
 * Time: 8:49
 */

namespace app\common\enums;


class SucceedCode
{
    // +----------------------------------------------------------------------
    // | 用户数据交互码
    // +----------------------------------------------------------------------
    const ADD_SUCCEED = ['code' => 201, 'message' => '新增成功'];
    const EDIT_SUCCEED = ['code' => 201, 'message' => '修改成功'];
    const DEL_SUCCEED = ['code' => 201, 'message' => '删除成功'];
    const Upload_SUCCEED = ['code' => 201, 'message' => '上传成功'];
}
