<?php

namespace app\common\controller;

use think\Controller;

class Upload extends Controller
{
    /**
     * Explain:上传头像
     * User: 徐涵诚
     * Date: 2018/8/16
     * Time: 15:34
     * @return \think\response\Json
     */
    public function uploadAvatar()
    {
        $file = request()->file('avatar');
        $info = $file->validate(['size' => 1024 * 1024 * 2, 'ext' => 'jpg,png,gif,jpeg'])->move(config('file.public_path') . config('file.avatar_path'));
        if ($info) {
            $data = config('message.Upload_SUCCEED');
            $data['file']['file_path'] = config('file.avatar_path') . $info->getSaveName();
            $data['file']['file_name'] = $info->getFilename();
            return json($data);
        } else {
            return json(config('message.Upload_ERROR'));
        }
    }
}
