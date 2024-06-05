<?php

return [
    'weather' => [
        'base_uri' => env('WEATHER_BASE_URI', 'localhost:8000'),
    ],
    'translate' => [
        'base_uri' => env('TRANSLATE_BASE_URI', 'localhost:8001'),
    ],
    'navigation' => [
        'base_uri' => env('NAVIGATION_BASE_URI', 'localhost:8002'),
    ],

];
