<?php

if (!function_exists('ho_is_arabic')) {
    /**
     * Check if a string contains Arabic characters.
     *
     * @param string $text
     * @return bool
     */
    function ho_is_arabic($text)
    {
        return preg_match('/\p{Arabic}/u', $text);
    }
}

if (!function_exists('ho_get_text_direction')) {
    /**
     * Get the text direction based on the language.
     *
     * @param string $text
     * @return string
     */
    function ho_get_text_direction($text)
    {
        return ho_is_arabic($text) ? 'rtl' : 'ltr';
    }
}


if (!function_exists('ho_truncate_text')) {
    /**
     * Truncate a given text to a specified number of characters.
     *
     * @param string $text The text to truncate.
     * @param int $length The maximum number of characters to return.
     * @param bool $ellipsis Whether to append ellipses (...) to the truncated text.
     * @return string The truncated text.
     */
    function ho_truncate_text($text, $length = 100, $ellipsis = true)
    {
        if (strlen($text) <= $length) {
            return $text;
        }

        $truncated = mb_substr($text, 0, $length);
        return $ellipsis ? $truncated . '...' : $truncated;
    }
}
