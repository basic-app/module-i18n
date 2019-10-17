<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\I18n\Models\TranslationModel;

if (!function_exists('t'))
{
	function t(string $category, string $string = '', array $params = []) : string
	{
		$data = TranslationModel::getEntity(
            [
                'translation_category' => $category, 
                'translation_source' => $string,
                'translation_lang' => current_lang()
            ],
            true,
            [
                'translation_value' => $string
            ]
        );

        $return = $data->translation_value;

		if ($params)
		{
			$return = strtr($return, $params);
		}

		return $return;
	}
}
