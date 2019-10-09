<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;

BasicApp\Core\CoreEvents::onPreSystem(function()
{
	helper(['t', 'current_lang']);
});

CodeIgniter\Events\Events::on('admin_main_menu', function($menu)
{
    if (BasicApp\I18n\Controllers\Admin\Translation::checkAccess())
    {
        $menu->items['system']['items']['translation'] = [
            'url' => Url::createUrl('admin/translation'),
            'label' => t('admin.menu', 'Translations'),
            'icon' => 'fa fa-book'
        ];
    }
});