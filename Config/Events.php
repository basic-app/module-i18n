<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;

use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;

SystemEvents::onPreSystem(function()
{
	helper(['t', 'current_lang']);
});

if (class_exists(AdminEvents::class))
{
    AdminEvents::onMainMenu(function($menu)
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
}