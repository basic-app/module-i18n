<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
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