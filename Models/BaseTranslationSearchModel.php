<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Models;

use Config\Database;

abstract class BaseTranslationSearchModel extends \BasicApp\Core\Model
{

    protected $returnType = TranslationSearch::class;

    protected $fieldLabels = [
        'category' => 'Category',
        'search' => 'Search'
    ];

    protected $langCategory = 'translations';

}