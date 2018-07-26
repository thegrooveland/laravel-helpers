<?php

if (!function_exists('str_truncate')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function str_truncate(string $string, int $max, int $start = 0, bool $addHtmlEntities = false, bool $cleanTags = true, bool $ellipsis = true)
    {
        $string = html_entity_decode($string);
        $string = strip_tags($string);
        if (strlen($string) > $max) {
            $max = $ellipsis? $max - 3 : $max;
            $string = mb_substr($string, $start, $max, "utf-8");
            $string .= $ellipsis ? '...' : '';
        }

        if ($addHtmlEntities) {
            $string = htmlentities($string, ENT_HTML5);
        }

        return $string;
    }
}

if (!function_exists('str_replace_first')) {

    /**
     * check if key exists in first level of array
     *
     * @param
     * @return
     */
    function str_replace_first($from, $to, $content)
    {
        $from = '/'.preg_quote($from, '/').'/';

        return preg_replace($from, $to, $content, 1);
    }
}
