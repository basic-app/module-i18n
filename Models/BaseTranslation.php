<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\I18n\Models;

abstract class BaseTranslation extends \BasicApp\Core\Entity
{

    protected $modelClass = TranslationModel::class;

	public $translation_id;

    public $translation_lang;

	public $translation_category;

	public $translation_source;

	public $translation_value;

	public $translation_created_at;

	public $translation_updated_at;

}