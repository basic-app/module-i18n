<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Models;

abstract class BaseTranslationModel extends \BasicApp\Core\Model
{

	protected $table = 'translations';

	protected $primaryKey = 'translation_id';

	protected $labels = [
		'translation_id' => 'ID',
		'translation_category' => 'Category',
        'translation_lang' => 'Language',
		'translation_source' => 'Source',
		'translation_value' => 'Value',
		'translation_created_at' => 'Created At',
		'translation_updated_at' => 'Updated At'
	];

    protected $translations = 'translations';

	protected $returnType = Translation::class;

	protected $useTimestamps = true;

	protected $createdField = 'translation_created_at';

	protected $updatedField = 'translation_updated_at';

    public static function createEntity($data = [], $save = false, $protect = true, &$error = NULL)
    {
        $return = parent::createEntity($data, $save, $protect, $error);

        if ($return)
        {
            $return->lang = current_lang();
        }

        return $return;
    }

    public function beforeSave(array $params) : array
    {
        $model = $params['data'];

        if (!$model->translation_lang)
        {
            $model->translation_lang = current_lang();
        }

        return parent::beforeSave($params);
    }

}