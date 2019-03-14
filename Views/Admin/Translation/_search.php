<?php

echo admin_theme_widget('form', [
    'options' => [
        'class' => 'mb-3'
    ],
    //'preset' => 'filter',
    'method' => 'GET',
    'fields' => [
        [
            'name' => 'search',
            'type' => 'text' ,
            'options' => [
                'placeholder' => t('admin', 'Search')
            ],
            'value' => $search->search
        ],
        [
            'name' => 'category',
            'type' => 'select',
            'items' => $searchModel::categories(['' => '...']),
            'value' => $search->category
        ]
    ],
    'buttons' => [
        'submit' => [
            'label' => t('admin', 'Apply Filter')
        ]
    ]
]);