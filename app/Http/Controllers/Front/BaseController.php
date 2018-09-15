<?php

namespace App\Http\Controllers\Front;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //
    /**
     * 检测前端请求url地址是否来自env配置
    */
    public function __construct()
    {
         if(!self::checkRequestUrl()){ throw new AuthorizationException("请求地址不合法"); }
    }

    private static function checkRequestUrl(){

        $config_url = env("WEB_API_URL_LOCAL");
        $config_url = explode('|', $config_url);
        $request_url = \Request::getHttpHost();
        return in_array($request_url,$config_url) ? true : false;
    }

}
