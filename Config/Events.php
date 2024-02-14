<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;
use BasicApp\Helpers\CliHelper;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\I18n\Controllers\Admin\Translation as TranslationController;
use Config\Database;
use BasicApp\I18n\Database\Seeds\I18nResetSeeder;
use BasicApp\AdminMenu\AdminMenuEvents;

SystemEvents::onReset(function(SystemResetEvent $event)
{
    $seeder = Database::seeder();

    $seeder->call(I18nResetSeeder::class);
});

if (class_exists(AdminMenuEvents::class))
{
    AdminMenuEvents::onMainMenu(function($menu)
    {
        $menu->items['system']['items']['translation'] = [
            'url' => Url::createUrl('admin/translation'),
            'label' => t('admin.menu', 'Translations')
        ];
    });
}