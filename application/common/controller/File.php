<?php

namespace app\common\controller;

use think\Controller;

class File extends Controller
{
    /**
     * Explain:删除文件
     * User: Xhc
     * Date: 2018/8/16
     * Time: 16:54
     * @return \think\response\Json
     */
    public function rmFile()
    {
        $file_path = request()->post('file_path');
        if (unlink(config('file.public_path') . $file_path)) {
            return json(config('message.DEL_SUCCEED'));
        } else {
            return json(config('message.DEL_ERROR'));
        }
    }
}
