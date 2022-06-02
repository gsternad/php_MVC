<?php

namespace App\Core;

/**
 * Request class.
 */
class Request
{
    /** @var array|null  */
    public ?array $route;

    /**
     * Sorts out URL so it can be mapped.
     */
    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        if (!is_array($url) && !empty($url)) {

            $url = explode('/', $url);
            foreach ($url as $key => $value) {
                if ($value == '/' || empty($value)) {
                    unset($url[$key]);
                }
            }

            $this->route['controller'] = isset($url[1]) ? ucfirst($url[1]) : 'Home';
            $this->route['template'] = ucfirst($this->route['controller']) . '.twig';
            $this->route['method'] = $url[2] ?? null;
            $this->route['params'] = count($url) > 2 ? array_slice(array_flip($url), 2) : null;
        }
    }
}
