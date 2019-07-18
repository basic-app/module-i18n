<?php

use BasicApp\Helpers\Url;

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm(['model' => $model, 'errors' => $errors]);

$url = Url::currentUrl();

echo $form->formOpen($url);

echo $form->input('translation_category');

echo $form->input('translation_source');

echo $form->input('translation_value');

echo $form->renderErrors();

$label = $model->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Create');

echo $form->submit($label);

echo $form->formClose();