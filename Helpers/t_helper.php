<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
use BasicApp\I18n\Models\TranslationModel;

if (!function_exists('t'))
{
	function t(string $category, string $string = '', array $params = []) : string
	{
		$return = TranslationModel::translate($category, $string);

		if ($params)
		{
			$return = strtr($return, $params);
		}

		return $return;
	}
}
