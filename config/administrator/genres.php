<?php

return [
    'title' => 'Genres',
    'single' => 'genres',
    'model' => 'App\Genre',
    'columns' => [
        'name',
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ]
    ],
    'filters' => [
        'name' => [
            'type' =>'text'
        ],
    ],
];