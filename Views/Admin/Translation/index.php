<?php

use BasicApp\I18n\Models\TranslationModel;
use BasicApp\Helpers\Url;

require __DIR__ . '/_common.php';

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$this->data['actionMenu'][] = [
	'url' => Url::returnUrl('admin/translation/create'), 
	'label' => t('admin.menu', 'Create'), 
	'icon' => 'fa fa-plus',
	'linkAttributes' => [
		'class' => 'btn btn-success'
	]
];

require __DIR__ . '/_search.php';

$adminTheme = service('adminTheme');

echo $adminTheme->table([
    'labels' => [
        TranslationModel::fieldLabel('translation_id'),
        TranslationModel::fieldLabel('translation_category'),
        TranslationModel::fieldLabel('translation_source'),
        TranslationModel::fieldLabel('translation_value'),
        '',
        ''
    ],
    'elements' => $elements,
    'columns' => function($model) {
        return [
            $this->createColumn(['attribute' => 'translation_id'])->displaySmall()->number(),
            $this->createColumn(['attribute' => 'translation_category'])->displayMedium(),
            $this->createColumn(['attribute' => 'translation_source'])->success(),
            $this->createColumn(['attribute' => 'translation_value'])->displayExtraLarge(),
            $this->createUpdateLinkColumn(['action' => 'admin/translation/update']),
            $this->createDeleteLinkColumn(['action' => 'admin/translation/delete'])
        ];
    }
]);

if ($pager)
{
    echo $pager->links('default', 'adminTheme');
}