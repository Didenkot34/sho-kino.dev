<?php

return [
    'title' => 'Cinematographs',
    'single' => 'cinematograph',
    'model' => 'App\Cinematograph',
    'columns' => [
        'name',
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
    ],
    'filters' => [
        'name' => [
            'type' =>'text'
        ],
    ],
];