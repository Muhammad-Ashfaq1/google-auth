<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Here you may specify which origins are allowed to access your resources.
    | You can specify specific origins or use '*' to allow all origins.
    |
    */
    'allowed_origins' => ['http://localhost:5173'], // Or specify specific origins, e.g., ['https://example.com']
    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Here you may specify the HTTP methods that are allowed for CORS requests.
    | You can use '*' to allow all methods or specify methods explicitly.
    |
    */
    'allowed_methods' => ['*'], // Or specify ['GET', 'POST', 'PUT', 'DELETE'] etc.

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Specify the headers that are allowed in the CORS requests. You can use
    | '*' to allow all headers or list specific headers.
    |
    */
    'allowed_headers' => ['*'], // Or specify headers explicitly, e.g., ['Content-Type', 'X-Requested-With']

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Headers that are allowed to be exposed to the browser.
    |
    */
    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | The maximum age (in seconds) for how long the results of a preflight
    | request can be cached by the client.
    |
    */
    'max_age' => 3600,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Indicates whether the response to the request can be exposed to
    | the page. When true, the browser will allow credentials such as
    | cookies and HTTP authentication.
    |
    */
    'supports_credentials' => true,
];
