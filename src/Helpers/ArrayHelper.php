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
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function to_array(&$data)
    {
        if ($data instanceof \stdClass) {
            $data = Jasny\arrayify($data);
        } elseif (method_exists($data, 'toArray')) {
            $data = $data->toArray();
        } elseif (!is_array($data)) {
            $data = [$data];
        }

        return $data;
    }
}
