<?php
return [
    'page_speed_url' => env('PAGE_SPEED_URL', 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed'),
    'google_api_key' => env('GOOGLE_API_KEY'),
    'frontend_url' => env('VUE_URL'),

    /* google Credentials */
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect_uri' => env('GOOGLE_REDIRECT_URL'),
];
