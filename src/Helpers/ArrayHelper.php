<?php

if (!function_exists('HasIn')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function HasIn($data, string $key)
    {
        if ($data instanceof \stdClass) {
            $data = Jasny\arrayify($data);
        } elseif ($data instanceof \Illuminate\Database\Eloquent\Collection) {
            $data = $data->toArray();
        } elseif (!is_array($data)) {
            $data = [$data];
        }
        
        foreach ($data as $_key => $_value) {
            if ($_key === $key) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('to_array')) {

    /**
     * Transform an stdClass, object with toArray method
     * or simple var into array, the parameter is passed by reference
     *
     * @param $data
     * @return void
     */
    function to_array(&$data) : void
    {
        if ($data instanceof \stdClass) {
            $data = Jasny\arrayify($data);
        } elseif (method_exists($data, 'toArray')) {
            $data = $data->toArray();
        } elseif (!is_array($data)) {
            $data = [$data];
        }
    }
}
