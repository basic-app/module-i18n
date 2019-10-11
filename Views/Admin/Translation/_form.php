<?php

use BasicApp\Helpers\Url;

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm($model, $errors);

$url = Url::currentUrl();

echo $form->open($url);

echo $form->inputGroup($data, 'translation_category');

echo $form->inputGroup($data, 'translation_source');

echo $form->inputGroup($data, 'translation_value');

echo $form->renderErrors();

echo $form->beginButtons();

$label = $data->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Create');

echo $form->submitButton($label);

echo $form->endButtons();

echo $form->close();