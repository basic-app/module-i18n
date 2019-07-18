<?php

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm(['model' => $search]);

echo $form->formOpen('', [
    'class' => 'mb-3',
    'method' => 'GET'
]);

echo $form->input('search');

echo $form->dropdown('category', $searchModel::categories(['' => '...']));

echo $form->renderErrors();

$label = t('admin', 'Apply Filter');

echo $form->submit($label);

echo $form->formClose();