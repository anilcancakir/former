<?php

namespace AnilcanCakir\Former\Fields;

use Illuminate\Contracts\Translation\Translator;

abstract class Field
{
    /**
     * The name of field.
     *
     * @var string
     */
    protected $name;

    /**
     * The label of field.
     *
     * @var
     */
    protected $label;

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
    /**
     * translator of Field
     *
     * @var Translator
     */
    private $translator;

    /**
     * Field constructor.
     *
     * @param Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Get the name of field.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the label of field.
     *
     * @return string
     */
    public function getLabel(): string
    {
        if ($this->label) {
            return $this->label;
        }
    }

    /**
     * Get the type of field.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the template of field.
     *
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * Set the name of field.
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Set the type of field.
     *
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }
}