<?php

$title = t('admin.menu', 'Translations');

$this->data['mainMenu']['system']['items']['translation']['active'] = true;

$this->data['breadcrumbs'][] = ['label' => $title, 'url' => site_url('admin/translation')];

$this->data['title'] = $title;