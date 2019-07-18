<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
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
