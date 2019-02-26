<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\I18n\Models;

abstract class BaseTranslationModel extends \BasicApp\Core\Model
{

	protected $table = 'translations';

	protected $primaryKey = 'translation_id';

	protected $allowedFields = [
		'translation_category',
		'translation_source',
		'translation_value',
        'translation_lang'
	];

	protected $validationRules = [
		'translation_category' => 'trim|max_length[255]|required',
		'translation_source' => 'trim|max_length[255]|required',
		'translation_value' => 'trim|max_length[255]|required'
	];

	protected static $fieldLabels = [
		'translation_id' => 'ID',
		'translation_category' => 'Category',
        'translation_lang' => 'Language',
		'translation_source' => 'Source',
		'translation_value' => 'Value',
		'translation_created_at' => 'Created At',
		'translation_updated_at' => 'Updated At'
	];

	protected $returnType = TranslationEntity::class;

	protected $useTimestamps = true;

	protected $createdField = 'translation_created_at';

	protected $updatedField = 'translation_updated_at';

	public static function translate(string $category, string $string) : string
	{
		$model = static::getEntity(
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

		return $model->translation_value;
	}

    public function beforeSave(array $model) : array
    {
        if (empty($model['translation_lang']))
        {
            $model['translation_lang'] = current_lang();
        }

        return parent::beforeSave($model);
    }

}