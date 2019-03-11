<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
use CodeIgniter\Events\Events;

Events::on('pre_system', function()
{
	helper(['t', 'current_lang']);
});

Events::on('admin_main_menu', function($menu)
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