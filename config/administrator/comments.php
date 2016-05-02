<?php

return [
    'title' => 'Comments',
    'single' => 'comment',
    'model' => 'App\Comment',
    'columns' => [
        'comment',
    ],
    'edit_fields' => [
        'comment' => [
            'type' => 'wysiwyg',
        ],
        'trailers' => [
            'type' => 'relationship',
            'title' => 'Countries',
            'name_field' => 'title',
        ],
        'users' => [
            'type' => 'relationship',
            'title' => 'Users',
            'name_field' => 'name',
        ],
    ],
    'filters' => [
        'comment' => [
            'type' => 'wysiwyg'
        ],
    ],
];