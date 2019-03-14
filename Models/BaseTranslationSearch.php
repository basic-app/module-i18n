<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\I18n\Models;

abstract class BaseTranslationSearch extends \BasicApp\Core\Entity
{

    protected $modelClass = TranslationSearchModel::class;

    public $category;

    public $search;

    public $lang;

}