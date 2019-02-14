<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\I18n\Controllers\Admin;

use BasicApp\I18n\Models\TranslationModel;

abstract class BaseTranslation extends \BasicApp\Core\AdminCrudController
{

	protected $modelClass = TranslationModel::class;

	protected $viewPath = 'BasicApp\I18n\Admin\Translation';

	protected $returnUrl = 'admin/translation';

	protected $perPage = 50;

}