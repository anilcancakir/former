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
    | The default supporting themes is "bootstrap" and "bulma".
    |
    */
    'theme' => env('FORMER_THEME', 'bootstrap'),

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
            'string',
        ],
        \AnilcanCakir\Former\Fields\Inputs\EmailInput::class => [
            'email',
        ],
        \AnilcanCakir\Former\Fields\Inputs\NumberInput::class => [
            'number',
        ],
        \AnilcanCakir\Former\Fields\Inputs\UrlInput::class => [
            'url',
        ],
        \AnilcanCakir\Former\Fields\Inputs\PasswordInput::class => [
            'password',
        ],
    ],

    'default_field' => \AnilcanCakir\Former\Fields\Input::class,
];
