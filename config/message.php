<?php
return [
    // +----------------------------------------------------------------------
    // | 错误码
    // +----------------------------------------------------------------------
    'NOT_NETWORK' => ['code' => 500, 'message' => '网络错误'],
    'PARMETER_ERROR' => ['code' => 403, 'message' => '提交参数异常'],
    'NOT_USERNAME_PASS' => ['code' => 401, 'message' => '用户名或密码错误'],
    'NOT_AUTH' => ['code' => 401, 'message' => '没有权限'],
    'ACCOUNT_ERROR' => ['code' => 403, 'message' => '账号异常'],
    'TOKEN_EXPIRED' => ['code' => 401, 'message' => '签名过期，请重新登陆'],
    'TOKEN_ABNORMAL' => ['code' => 401, 'message' => '签名异常，请重新登陆'],
    'Upload_ERROR' => ['code' => 401, 'message' => '上传失败'],
    'ADD_ERROR' => ['code' => 404, 'message' => '新增失败'],
    'EDIT_ERROR' => ['code' => 404, 'message' => '修改失败'],
    'DEL_ERROR' => ['code' => 404, 'message' => '删除失败'],
    // +----------------------------------------------------------------------
    // | 成功码
    // +----------------------------------------------------------------------
    'ADD_SUCCEED' => ['code' => 201, 'message' => '新增成功'],
    'EDIT_SUCCEED' => ['code' => 201, 'message' => '修改成功'],
    'DEL_SUCCEED' => ['code' => 201, 'message' => '删除成功'],
    'Upload_SUCCEED' => ['code' => 201, 'message' => '上传成功']
];

