<?php

return [
    'title' => 'Countries',
    'single' => 'country',
    'model' => 'App\Country',
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