<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\FormerHelper;
use AnilcanCakir\Former\Fields\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class Form
{
    /**
     * The form fields.
     *
     * @var Collection
     */
    protected $fields;

    /**
     * The form model.
     *
     * @var Model
     */
    protected $model;

    /**
     * The form theme.
     *
     * @var string
     */
    protected $theme;

    /**
     * The helper of former.
     *
     * @var FormerHelper
     */
    protected $helper;

    /**
     * Form constructor.
     *
     * @param Model|null $model
     * @param FormerHelper $formerHelper
     */
    public function __construct(Model $model = null, FormerHelper $formerHelper)
    {
        $this->model = $model;
        $this->helper = $formerHelper;

        $this->fields = new Collection();
    }

    /**
     * Get the model fields.
     *
     * @return Collection
     */
    public function getFields(): Collection
    {
        return $this->fields;
    }

    /**
     * Set the model fields.
     *
     * @param string $input
     * @param string $name
     * @param array $rules
     */
    public function addField($input, $name, array $rules)
    {
        /** @var Field $field */
        $field = new $input();
        $field->setForm($this);
        $field->setName($name);
        $field->setRules($rules);

        $this->fields->put($name, $field);
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

    public function getHelper(): FormerHelper
    {
        return $this->helper;
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

    /**
     * Set the form theme.
     *
     * @param string|null $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    public function start()
    {
        return new HtmlString(
            view($this->helper->getViewPath('form.start', $this->theme), [
                'form' => $this
            ])
        );
    }

    public function end()
    {
        return new HtmlString(
            view($this->helper->getViewPath('form.start', $this->theme), [
                'form' => $this
            ])
        );
    }

    public function field(string $name)
    {
        /** @var Field $field */
        $field = $this->fields->get($name);

        return new HtmlString(
            view($this->helper->getViewPath($field->getTemplate(), $this->theme), [
                'field' => $field
            ])
        );
    }
}