<?php

use BasicApp\I18n\Models\TranslationModel;

require __DIR__ . '/_common.php';

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$this->data['actionMenu'][] = [
	'url' => classic_url('admin/translation/create', ['returnUrl' => classic_uri_string()]), 
	'label' => t('admin.menu', 'Add Translation'), 
	'icon' => 'fa fa-plus',
	'linkOptions' => [
		'class' => 'btn btn-success'
	]	
];

require __DIR__ . '/_search.php';

$rows = [];

foreach($elements as $model)
{
    $rows[] = [
        'columns' => [
            ['preset' => 'id small', 'content' => $model->translation_id],
            ['preset' => 'medium', 'content' => $model->translation_category],
            ['preset' => 'primary', 'content' => $model->translation_source],
            ['preset' => 'large', 'content' => $model->translation_value],
            ['preset' => 'button', 'content' => admin_theme_widget('tableButtonUpdate', [
                'label' => t('admin', 'Update'),
                'url' => classic_url('admin/translation/update', [
                    'id' => $model->getPrimaryKey(),
                    'returnUrl' => classic_uri_string()
                ])
            ])],
            ['preset' => 'button', 'content' => admin_theme_widget('tableButtonDelete', [
                'label' => t('admin', 'Delete'),
                'url' => classic_url('admin/translation/delete', [
                    'id' => $model->getPrimaryKey(),
                    'returnUrl' => classic_uri_string()
                ])
            ])]
        ]
    ];
}

echo admin_theme_widget('table', [
    'head' => [
        'columns' => [
            ['preset' => 'id small', 'content' => '#'],
            ['preset' => 'medium', 'content' => TranslationModel::label('translation_category')],
            ['content' => TranslationModel::label('translation_source')],
            ['preset' => 'large', 'content' => TranslationModel::label('translation_value')],
            ['options' => ['colspan' => 2]]
        ]
    ],
    'rows' => $rows
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}