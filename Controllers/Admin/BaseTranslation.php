<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Controllers\Admin;

use BasicApp\I18n\Models\Admin\TranslationModel;
use BasicApp\I18n\Models\TranslationSearchModel;

abstract class BaseTranslation extends \BasicApp\Admin\AdminCrudController
{

	protected $modelClass = TranslationModel::class;

	protected $viewPath = 'BasicApp\I18n\Admin\Translation';

	protected $returnUrl = 'admin/translation';

	protected $perPage = 25;

    protected $searchModelClass = TranslationSearchModel::class;

}