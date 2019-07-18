<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin', 'Update')];

$this->data['enableCard'] = true;

$this->data['cardTitle'] = $this->data['title'];

echo app_view('BasicApp\I18n\Admin\Translation\_form', [
    'model' => $model,
    'errors' => $errors
]);