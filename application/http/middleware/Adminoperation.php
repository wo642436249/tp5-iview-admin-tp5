<?php

namespace app\http\middleware;

use app\common\model\Auth;

class Adminoperation
{
    public function handle($request, \Closure $next)
    {
        $token = $request->header('authorization');
        if ($token) {
            $res = Auth::Analysis($token);
            if ($res['code'] == 200) {
                return $next($request);
            } else {
                return json($res);
            }
        } else {
            return redirect('https://www.baidu.com/');
        }
    }
}
