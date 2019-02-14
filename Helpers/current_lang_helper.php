<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
if (!function_exists('current_lang'))
{
	function current_lang()
	{
        static $lang;

        if (!$lang)
        {
            $lang = service('request')->getLocale();
        }

        return $lang;
	}
}