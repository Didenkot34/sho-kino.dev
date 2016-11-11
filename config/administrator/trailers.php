<?php
return [
    'title' => 'Trailers',
    'single' => 'trailers',
    'model' => 'App\Trailer',
    'columns' => [
        'title',
        'description',
        'poster' => [
            'title' => 'Poster',
            'output' => '<img class="img img-thumbnail img-responsive" src="/uploads/trailers/medium/(:value)" width="100px" />',
        ],
        'name' => [
            'title' => 'Cinematograph',
            'relationship' => 'cinematographs',
            'select' => '(:table).name',
        ],
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
        ],
        'cinematographs' => [
                'type' => 'relationship',
                'title' => 'Cinematograph',
                'name_field' => 'name',
        ],
        'genres' => [
                'type' => 'relationship',
                'title' => 'Genres',
                'name_field' => 'name',
        ],
        'actors' => [
                'type' => 'relationship',
                'title' => 'Actors',
                'name_field' => 'name',
        ],
        'description' => [
            'type' => 'wysiwyg',
            'title' => 'Description',
        ],
        'poster' => [
            'title' => 'Poster',
            'type' => 'image',
            'location'=> public_path() . '/uploads/trailers/originals/',
            'sizes' => [
                [500, 500, 'auto', public_path() . '/uploads/trailers/medium/', 100],
                [1600, 520, 'auto', public_path() . '/uploads/trailers/poster/', 100],
            ],
        ],
        'carousel_image' => [
            'title' => 'Carousel',
            'type' => 'image',
            'location'=> public_path() . '/uploads/trailers/originals/carousel/',
            'sizes' => [
                [500, 500, 'auto', public_path() . '/uploads/trailers/medium/carousel/', 100],
                [2300, 900, 'auto', public_path() . '/uploads/trailers/poster/carousel/', 100],
            ],
        ],
        'video_link' => [
            'type' => 'text',
            'title' => 'Video link',
        ],
        'year' => [
            'type' => 'text',
            'title' => 'Year',
        ],
        'age_limit' => [
            'type' => 'text',
            'title' => 'Age Limit',
        ],
        'countries' => [
            'type' => 'relationship',
            'title' => 'Countries',
            'name_field' => 'name',
        ],
        'premiere_in_ukraine' => [
            'type' => 'date',
            'title' => 'Premiere in Ukraine',
            'date_format' => 'yy-mm-dd',
        ],
        'world_premiere' => [
            'type' => 'date',
            'title' => 'Premiere in World',
            'date_format' => 'yy-mm-dd',
        ],
        'rating_kinopoisk' => [
            'type' => 'text',
            'title' => 'rating kinopoisk',
        ],
        'rating_iMDb' => [
            'type' => 'text',
            'title' => 'rating iMDb',
        ],
        'editors_choice' => [
            'type' => 'bool',
            'title' => 'Is editor\'s choice',
        ],
        'active' => [
            'type' => 'bool',
            'title' => 'Is active trailer',
        ],
        'carousel_active' => [
            'type' => 'bool',
            'title' => 'Is active carousel',
        ],

    ],
    'filters' => [
        'title' => [
            'type' =>'text'
        ],
    ],
    'form_width' => 800,
];