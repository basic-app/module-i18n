<?php

$routes->add('admin/translation', 'BasicApp\I18n\Controllers\Admin\Translation::index');
$routes->add('admin/translation/(:segment)', 'BasicApp\I18n\Controllers\Admin\Translation::$1');