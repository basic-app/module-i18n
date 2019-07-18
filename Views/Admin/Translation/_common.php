<?php

use BasicApp\Helpers\Url;

$title = t('admin.menu', 'Translations');

$this->data['mainMenu']['system']['items']['translation']['active'] = true;

$this->data['breadcrumbs'][] = ['label' => $title, 'url' => Url::createUrl('admin/translation')];

$this->data['title'] = $title;