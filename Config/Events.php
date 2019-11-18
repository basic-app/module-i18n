<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;
use BasicApp\Helpers\CliHelper;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;

SystemEvents::onPreSystem(function()
{
	helper(['t', 'current_lang']);
});

SystemEvents::onSeed(function($event)
{
    if ($event->reset)
    {
        $db = db_connect();

        if (!$db->simpleQuery('TRUNCATE TABLE translations'))
        {
            throw new Exception($db->error());
        }

        CliHelper::message('translation table truncated');
    }
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