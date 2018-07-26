<?php

if (!function_exists('format_date')) {
    function format_date(string $date, string $format = 'Y/m/d H:i:s')
    {
        try {
            $result = \Illuminate\Support\Carbon::parse($date);
            $result = $result->format($format);
        } catch (Exception $e) {
            $result = null;
        }
        return $result;
    }
}
