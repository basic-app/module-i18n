<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
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