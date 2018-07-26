<?php

if (!function_exists('is_collection')) {

    /**
     * Check if $value is a instance of Eloquent Collection
     *
     * @param any $value
     * @return bool
     */
    function is_collection($value) : bool
    {
        return $value  instanceof \Illuminate\Database\Eloquent\Collection;
    }
}

if (!function_exists('to_obj')) {

    /**
     * Transform an array, object with Object method
     * or simple var into stdClass, the parameter is passed by reference
     *
     * @param $data
     * @return void
     */
    function to_obj(&$data) : void
    {
        if (is_array($data)) {
            $data = Jasny\objectify($data);
        } elseif ($data instanceof \Illuminate\Database\Eloquent\Collection) {
            $data = $data->toArray();
            to_obj($data);
        } elseif (is_object($data) && method_exists($data, 'toArray')) {
            $data = $data->toArray();
            to_obj($data);
        } elseif (!$data instanceof \stdClass) {
            $value = $data;
            $data = new \stdClass();
            $data->value = $value;
        }
    }
}
