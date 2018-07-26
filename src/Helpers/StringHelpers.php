<?php

if (!function_exists('str_truncate')) {

    /**
     * Truncate a string by a max of chars, optionally can add HTML entities, preserve tags and add ellipsis
     *
     * @param string $string
     * @param int $max
     * @param int $start
     * @param bool $addHtmlEntities
     * @param bool $cleanTags
     * @param bool $ellipsis
     * @return string
     */
    function str_truncate(string $string, int $max, int $start = 0, bool $addHtmlEntities = false, bool $cleanTags = true, bool $ellipsis = true) : string
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
     * Replace the first coincidence in a string
     *
     * @param string $from
     * @param string $to
     * @param string $content
     * @return string
     */
    function str_replace_first(string $from, string $to, string $content) : string
    {
        $from = '/'.preg_quote($from, '/').'/';

        return preg_replace($from, $to, $content, 1);
    }
}
