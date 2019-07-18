<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
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