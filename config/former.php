<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Former Theme
    |--------------------------------------------------------------------------
    |
    | The Former is can use multiple themes by default. You can enter your
    | preferred the theme name. Former will be use this theme views when
    | generating form.
    |
    | The default supporting themes is "bulma" and "bootstrap".
    |
    */
    'theme' => env('FORMER_THEME', 'bulma'),

    /*
    |--------------------------------------------------------------------------
    | Former Fields Configuration
    |--------------------------------------------------------------------------
    |
    | This config field is mapping the fields to rules. You can map
    | the filed class to validation rule(s). The Former uses this map
    | in generating form.
    |
    */
    'fields' => [
        \AnilcanCakir\Former\Fields\Input::class => [
            'string', 'number', 'email', 'url'
        ]
    ]
];