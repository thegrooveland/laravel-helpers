<?php

if (!function_exists('root_path')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function root_path(string $path = '')
    {
        $root = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
        $path = trim($path, '\\/');
        return "{$root}/{$path}";
    }
}

if (!function_exists('tmp_path')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function tmp_path(string $path = '')
    {
        return storage_path("tmp/{$path}");
    }
}
