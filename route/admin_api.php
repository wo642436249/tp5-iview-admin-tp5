<?php
Route::header('Access-Control-Allow-Credentials', 'true')->allowCrossDomain();
Route::post('AdminLogin', 'admin/Login/index');
Route::resource('AdminUser', 'admin/user')->middleware('Adminoperation'); //后台用户
Route::resource('AdminRule', 'admin/rule')->middleware('Adminoperation'); //后台操作
Route::resource('AdminRole', 'admin/role')->middleware('Adminoperation'); //后台角色
Route::resource('AdminRoleRule', 'admin/power')->middleware('Adminoperation'); //后台角色关联后台操作
Route::post('uploadAvatar', '@common/Upload/uploadAvatar'); //头像上传
Route::post('RmFile', '@common/File/rmFile')->middleware('Adminoperation'); //删除文件
