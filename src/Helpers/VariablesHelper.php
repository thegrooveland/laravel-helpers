<?php

if (!function_exists('get')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return any
     */
    function get($variable, string $index, $default = null)
    {
        $search = explode('.', $index);
        to_obj($variable);

        foreach ($search as $_index) {
            if (is_array($variable)) {
                $variable = $variable[$_index] ?? null;
            } elseif ($variable instanceof \stdClass) {
                $variable = $variable->$_index ?? null;
            } elseif (is_null($variable)) {
                break;
            }
        }

        return $variable ?? $default;
    }
}

if (!function_exists('find')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return any
     */
    function find(string $string, $list)
    {
        to_array($list);
        
        $result = null;
        foreach ($list as $value) {
            if ($string === $value) {
                $result = $string;
                break;
            }
        }

        return $result;
    }
}

if (!function_exists('is_countable')) {
    /**
     * check if value is array or instance of countable
     *
     * @param any $var
     * @return boolean
     */
    function is_countable($var): bool
    {
        return is_array($var) || $var instanceof Countable;
    }
}

if (!function_exists('length')) {
    /**
     * Retunr the number of index in variable
     *
     * @param any $var
     * @return integer
     */
    function length($var): int
    {
        return (is_countable($var))? count($var) : 0;
    }
}
