<?php

return [
    'title' => 'Actors Video from Youtube',
    'single' => 'youtube',
    'model' => 'App\Youtube',
    'columns' => [
        'title',
        'video_link' => [
            'title' => 'Video',
            'output' => '<div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="(:value)"
                                    allowfullscreen></iframe>
                        </div>',
        ],
    ],
    'edit_fields' => [
        'title' => [
            'type' => 'text',
        ],
        'description' => [
            'type' => 'wysiwyg',
        ],
        'video_link' => [
            'title' => 'Video link',
            'type' => 'text',
        ],
    ],
    'filters' => [
        'title' => [
            'type' =>'text'
        ],
    ],
    'form_width' => 800,
];