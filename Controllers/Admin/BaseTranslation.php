<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\I18n\Controllers\Admin;

use BasicApp\I18n\Models\TranslationModel;
use BasicApp\I18n\Models\TranslationSearchModel;

abstract class BaseTranslation extends \BasicApp\Admin\AdminCrudController
{

	protected $modelClass = TranslationModel::class;

	protected $viewPath = 'BasicApp\I18n\Admin\Translation';

	protected $returnUrl = 'admin/translation';

	protected $perPage = 25;

    protected $searchModelClass = TranslationSearchModel::class;

}