<?php

namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        
    }

    public function hello($name = '')
    {
        return 'Hello' . $name;
    }
}
