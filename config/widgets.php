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
            'features' => ['category']
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
            'features' => []
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
            'features' => ['category', 'products']
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
            'features' => ['category']
        ],
        5 => [
            'type' => 'box2',
            'text' => 'Promobox x2',
            'files' => 2,
            'mime' => 'image',
            'size' => '380x25',
            'size' => [
                'width' => 555,
                'height' => 310,
            ],
            'features' => []
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
            'features' => []
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
            'features' => []
        ],
        
    ]

];