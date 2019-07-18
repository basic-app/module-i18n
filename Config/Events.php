<?php

BasicApp\Core\CoreEvents::onPreSystem(function()
{
	helper(['t', 'current_lang']);
});

BasicApp\Admin\AdminEvents::onAdminMainMenu(function($menu)
{
    if (BasicApp\I18n\Controllers\Admin\Translation::checkAccess())
    {
        $menu->items['system']['items']['translation'] = [
            'url' => site_url('admin/translation'),
            'label' => t('admin.menu', 'Translations'),
            'icon' => 'fa fa-book'
        ];
    }
});