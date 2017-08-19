<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\Form\Factory;
use AnilcanCakir\Former\Fields\Field;
use Illuminate\Database\Eloquent\Model;

class Form
{
    /**
     * The form fields.
     *
     * @var Field[]
     */
    protected $fields = [];

    /**
     * The form model.
     *
     * @var Model
     */
    protected $model;

    /**
     * Get the model fields.
     *
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Set the model fields.
     *
     * @param $name
     * @param array $rules
     */
    public function addField($name, array $rules)
    {
        $field = new Field();
    }

    /**
     * Get the form model.
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Set the form model.
     *
     * @param Model $model
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }
}