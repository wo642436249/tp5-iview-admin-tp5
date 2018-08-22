tp5-iview-admin(api-V1.0)
===================
tp5-iview-admin V1.0其主要目的是为了做一个最基本的包括管理员、角色、操作管理的系统。
> 此API基于TP5.1开发

> 建议将此项目部署到linux服务器，运行环境要求PHP5.6以上（建议结合swoole运行，包含swoole4.*扩展、运行环境要求PHP7.0以上）

> 安装：
 + 将项目拷贝至服务器，将根目录的.sql文件导入数据库、修改config目录的数据库配置文件
 + 后台账号admin123,密码admin123

> 包含Api如下：
 + 管理员管理Api
 + 角色管理Api
 + 操作管理Api
 + 后台登陆Api
 + 用户头像上传Api
 + 文件删除Api
 
 > 包含中间件如下：
 + 基于JWT的认证

## 主要问题（逐渐调整）
+ 人员-角色-操作验证未开发

+ 接口只进行基本的身份验证，未对提交的数据做验证，目前主要依靠前端做用户提交数据验证

+ 文件删除Api存在一定漏洞，正常使用不会出现

+ API Root URL不符合RESETful API 设计规范，未对API添加相关的版本号，例如V1、V2......

+ API返回状态码有待一定的调整

+ 所有操作为做相关的日志记录

+ 一些程序结构有待调整，利于后期维护性、扩展性简单、方便

## 其他说明

+ 关于已安装扩展，若不需要可自行用composer卸载，例如workerman、gateway




