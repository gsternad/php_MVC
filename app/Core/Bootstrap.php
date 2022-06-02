<?php

namespace App\Core;

use Exception;
use App\Core\Request;
use App\Core\Render as Template;
use App\Core\Config;

/**
 * Bootstrap class.
 */
class Bootstrap
{
    /**
     * Pretty naive but it does its job.
     *
     * @param $path
     * @param \App\Core\Request $request
     * @return void
     */
    public function deploy($path, Request $request)
    {
        try {
            $class = 'App\\Controllers\\' . $request->route['controller'];
            if (!$controller = class_exists($class)) {
                throw new Exception('<b>' . $request->route['controller'] . '</b> was not found in <i>Controllers</i> folder.');
            }
            $controller = new $class();
            $controller->draw($request, Template::setInstance($path));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
