<?php

namespace app\common\controller;

use think\Controller;
use app\common\enums\SucceedCode;
use app\common\enums\ErrorCode;

class File extends Controller
{
    /**
     * Explain:删除文件
     * User: 徐涵诚
     * Date: 2018/8/16
     * Time: 16:54
     * @return \think\response\Json
     */
    public function rmFile()
    {
        $file_path = request()->post('file_path');
        if (unlink(config('file.public_path') . $file_path)) {
            return json(SucceedCode::DEL_SUCCEED);
        } else {
            return json(ErrorCode::DEL_ERROR);
        }
    }
}
