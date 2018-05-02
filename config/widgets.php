<?php
return [

    'types' => [
        1 => [
            'type' => 'image',
            'text' => 'Imagen promocional + 3 videos',
            'files' => 4,
            'mime' => 'image',
            'size' => [
                'width' => 1140,
                'height' => 432,
            ],
            'features' => ['category'],
            'has_title' => true,
            'has_subtitle' => false,
            'has_description' => true
        ],
        2 => [
            'type' => 'banner',
            'text' => 'Banner',
            'files' => 1,
            'mime' => 'image',
            'size' => [
                'width' => 1140,
                'height' => 225,
            ],
            'features' => [],
            'has_title' => false,
            'has_subtitle' => false,
            'has_description' => false
        ],
        3 => [
            'type' => 'video',
            'text' => 'Imagen promocional con video',
            'files' => 1,
            'mime' => 'video',
            'size' => [
                'width' => 1140,
                'height' => 636,
            ],
            'features' => ['category', 'products'],
            'has_title' => true,
            'has_subtitle' => true,
            'has_description' => true
        ],
        4 => [
            'type' => 'videox3',
            'text' => 'Videos x 3',
            'files' => 3,
            'mime' => 'video',
            'size' => [
                'width' => 380,
                'height' => 213,
            ],
            'features' => ['category'],
            'has_title' => false,
            'has_subtitle' => false,
            'has_description' => false
        ],
        5 => [
            'type' => 'box',
            'text' => 'Promobox',
            'files' => 1,
            'mime' => 'image',
            'size' => '380x25',
            'size' => [
                'width' => 555,
                'height' => 310,
            ],
            'features' => ['category'],
            'has_title' => false,
            'has_subtitle' => false,
            'has_description' => false
        ],
        6 => [
            'type' => 'box4',
            'text' => 'Box x 4',
            'files' => 4,
            'mime' => 'image',
            'size' => '555x310',
            'size' => [
                'width' => 555,
                'height' => 310,
            ],
            'features' => [],
            'has_title' => false,
            'has_subtitle' => false,
            'has_description' => false
        ],
        7 => [
            'type' => 'slider',
            'text' => 'Slider',
            'files' => 6,
            'mime' => 'image',
            'size' => '555x310',
            'size' => [
                'width' => 1140,
                'height' => 432,
            ],
            'features' => [],
            'has_title' => true,
            'has_subtitle' => false,
            'has_description' => true
        ],
        8 => [
            'type' => 'category',
            'text' => 'Categoria destacada',
            'files' => 1,
            'mime' => 'image',
            'size' => [
                'width' => 1140,
                'height' => 432,
            ],
            'features' => ['category', 'features'],
            'has_title' => true,
            'has_subtitle' => true,
            'has_description' => false
        ],        
    ]

];