<?php

namespace App\Controllers;

use App\Core\Bootstrap;
use App\Core\Render;
use App\Models\Contract;

class Home implements Contract
{
    public function draw($request)
    {
        echo Render::getInstance()->render($request->route['template'], [
            "Title" => "PHP Class",
            "RouteToUser" => "user/1",
            "LinkTitle" => "Link",
            "Method" => $request->route['method'],
            "Params" => isset($request->route['params']) ? array_flip($request->route['params']) : NULL,
        ]);
    }
}