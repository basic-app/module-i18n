<?php

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm($searchModel);

echo $form->open(null, ['class' => 'mb-3','method' => 'GET']);

echo $form->inputGroup($search, 'search');

echo $form->dropdownGroup($search, 'category', $search->categoryList(['' => '...']));

echo $form->renderErrors();

echo $form->beginButtons();

echo $form->submitButton(t('admin', 'Apply Filter'));

echo $form->endButtons();

echo $form->close();