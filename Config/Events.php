<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;

use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use CodeIgniter\CLI\CLI;

SystemEvents::onPreSystem(function()
{
	helper(['t', 'current_lang']);
});

SystemEvents::onUpdate(function($event)
{
    if ($event->reset)
    {
        $db = db_connect();

        if (!$db->simpleQuery('TRUNCATE TABLE translations'))
        {
            throw new Exception($db->error());
        }

        echo 'translation table truncated' . PHP_EOL;
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