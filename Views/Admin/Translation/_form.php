<?php

echo admin_theme_widget('form', [
    'errors' => $errors,
    'buttons' => [
        'submit' => [
            'label' => $model->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Create')
        ]
    ],
    'fields' => [
        [
            'type' => 'text',
            'label' => $model->label('translation_category'),
            'name' => 'translation_category',
            'value' => $model->translation_category
        ],
        [
            'type' => 'text',
            'label' => $model->label('translation_source'),
            'name' => 'translation_source',
            'value' => $model->translation_source
        ],
        [
            'type' => 'text',
            'label' => $model->label('translation_value'),
            'name' => 'translation_value',
            'value' => $model->translation_value
        ]
    ]
]);