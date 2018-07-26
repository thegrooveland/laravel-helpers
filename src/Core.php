<?php

namespace Grooveland\Helpers;

class Core
{
    public static function load()
    {
        static::default();
        static::custom();
    }

    /**
     * load custom helpers automatically
     */
    private static function default()
    {
        $path = __DIR__ . '/Helpers';
        foreach (glob("{$path}/*.php") as $file) {
            require_once($file);
        }
    }

    /**
     * load custom helpers automatically
     */
    private static function custom()
    {
        $path = app_path();
        $folder = config('groovie_helpers.directory');
        foreach (glob("{$path}/{$folder}/*.php") as $file) {
            require_once($file);
        }
    }
}
