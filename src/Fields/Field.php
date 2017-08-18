<?php

namespace AnilcanCakir\Former\Fields;

abstract class Field
{
    /**
     * The name of field.
     *
     * @var string
     */
    protected $name;

    /**
     * The type of field.
     *
     * @var string
     */
    protected $type = 'text';

    /**
     * The template of field.
     *
     * @var string
     */
    protected $template;
}