<?php

namespace AnilcanCakir\Former\Fields;

class Input extends Field
{
    /**
     * The type of input.
     *
     * @var string
     */
    protected $type = 'text';

    /**
     * Get type of input.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
