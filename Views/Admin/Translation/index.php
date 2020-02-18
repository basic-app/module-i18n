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

echo $adminTheme->grid([
    'headers' => [
        ['class' => $adminTheme::GRID_HEADER_PRIMARY_KEY, 'content' => $model->getFieldLabel('translation_id')],
        ['class' => $adminTheme::GRID_HEADER_MEDIUM, 'content' => $model->getFieldLabel('translation_category')],
        ['class' => $adminTheme::GRID_HEADER_LABEL, 'content' => $model->getFieldLabel('translation_source')],
        $model->getFieldLabel('translation_value'),
        ['class' => $adminTheme::GRID_HEADER_BUTTON_UPDATE],
        ['class' => $adminTheme::GRID_HEADER_BUTTON_DELETE]
    ],
    'items' => function() use ($elements, $adminTheme) {
        
        foreach($elements as $data)
        {
            yield [
                $data->translation_id,
                $data->translation_category,
                $data->translation_source,
                $data->translation_value,
                ['url' => Url::returnUrl('admin/translation/update', ['id' => $data->translation_id])],
                ['url' => Url::returnUrl('admin/translation/delete', ['id' => $data->translation_id])]
            ];
        }
    }
]);

if ($pager)
{
    echo $pager->links('default', 'adminTheme');
}