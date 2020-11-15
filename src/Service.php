<?php

namespace temporary\action;

use think\Request;
use think\Response;
use think\Route;

class Service extends \think\Service
{
    public function boot()
    {
        $this->registerRoutes(function (Route $route) {
            $route->any('action/:unionid', function ($unionid, Request $request) {
                $key = $this->app->config->get('temporary_action.key');
                $data = AES::decode($key, $unionid);
                if (!$data) {
                    return Response::create()->code(403);
                }
            })->allowCrossDomain();
        });
    }
}