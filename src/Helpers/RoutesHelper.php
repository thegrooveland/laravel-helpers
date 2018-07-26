<?php

if (!function_exists('route_param')) {

    /**
     * Get the param route if exists
     *
     * @param
     * @return
     */
    function route_param(string $param)
    {
        $params = route_params();
        
        return get($params, $param);
    }
}

if (!function_exists('route_params')) {

    /**
     * Get the param route if exists
     *
     * @param
     * @return
     */
    function route_params()
    {
        $params = request()->route()->parameters();
        return $params;
    }
}

if (!function_exists('current_route_name')) {

    /**
     * Get the current route
     *
     * @return
     */
    function current_route_name()
    {
        $route = request()->route();
        $route = $route->getName();
        return $route;
    }
}
