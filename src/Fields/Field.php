<?php

namespace AnilcanCakir\Former\Fields;

use AnilcanCakir\Former\Form;

abstract class Field
{
    /**
     * The form of field.
     *
     * @var Form
     */
    protected $form;

    /**
     * The name of field.
     *
     * @var string
     */
    protected $name;

    /**
     * The template of field.
     *
     * @var string
     */
    protected $template = 'fields.input';

    /**
     * The rules of field.
     *
     * @var array
     */
    protected $rules;

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
     * Get the template of field.
     *
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * Get the label of field.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->form->getHelper()->getLabel($this->name);
    }

    /**
     * Get the placeholder of field.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return $this->form->getHelper()->getPlaceholder($this->name);
    }

    /**
     * Get the text of field.
     *
     * @return null|string
     */
    public function getText()
    {
        return $this->form->getHelper()->getText($this->name);
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
     * Set the rules of field.
     *
     * @param array $rules
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Set the form of field.
     *
     * @param Form $form
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
    }
}