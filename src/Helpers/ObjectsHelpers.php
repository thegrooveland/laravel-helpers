<?php

if (!function_exists('is_collection')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function is_collection($value)
    {
        return $value  instanceof \Illuminate\Database\Eloquent\Collection;
    }
}

if (!function_exists('to_obj')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function to_obj(&$data)
    {
        if (is_array($data)) {
            $data = Jasny\objectify($data);
        } elseif ($data instanceof \Illuminate\Database\Eloquent\Collection) {
            $data = $data->toArray();
            to_obj($data);
        }else if(is_object($data) && method_exists($data, 'toArray')) {
            $data = $data->toArray();
            to_obj($data);
        } elseif (!$data instanceof \stdClass) {
            $value = $data;
            $data = new \stdClass();
            $data->value = $value;
        }

        return $data;
    }
}