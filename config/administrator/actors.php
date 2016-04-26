<?php
return [
    'title' => 'Actors',
    'single' => 'actor',
    'model' => 'App\Actor',
    'columns' => [
        'name',
        'birthday',
        'avatarka' => [
            'title' => 'Avatarka',
            'output' => '<img class="img img-thumbnail img-responsive" src="/uploads/actors/avatarks/medium/(:value)" width="100px" />',
        ],
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        'slug' => [
            'type' => 'text',
        ],
        'birthday' => [
            'type' => 'date',
            'title' => 'Birthday',
            'date_format' => 'yy-mm-dd',
        ],
        'biography' => [
            'type' => 'wysiwyg',
            'title' => 'Biography',
        ],
        'youtube' => [
            'type' => 'relationship',
            'title' => 'Actors video in youtube',
            'name_field' => 'title',
        ],
        'avatarka' => [
            'title' => 'Poster',
            'type' => 'image',
            'location'=> public_path() . '/uploads/actors/avatarks/originals/',
            'sizes' => [
                [200, 200, 'auto', public_path() . '/uploads/actors/avatarks/medium/', 100],
            ],
        ],
    ],
    'filters' => [
        'name' => [
            'type' =>'text'
        ],
    ],
    'form_width' => 800,
];