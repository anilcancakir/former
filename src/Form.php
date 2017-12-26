<?php

namespace AnilcanCakir\Former;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use AnilcanCakir\Former\Fields\Field;
use Illuminate\Database\Eloquent\Model;
use AnilcanCakir\Former\Contracts\FormerHelper;

class Form
{
    /**
     * The form fields.
     *
     * @var Collection|Field[]
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
     * The action of form.
     *
     * @var string
     */
    protected $action;

    /**
     * The method of form.
     *
     * @var string
     */
    protected $method = 'POST';

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
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
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

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function setActionFromRoute($route)
    {
        $this->action = $this->helper->getUrlByRoute($route);
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function start()
    {
        return new HtmlString(
            view($this->helper->getViewPath('form.start', $this->theme), [
                'form' => $this,
            ])
        );
    }

    public function end()
    {
        return new HtmlString(
            view($this->helper->getViewPath('form.start', $this->theme), [
                'form' => $this,
            ])
        );
    }

    public function field(string $name)
    {
        /** @var Field $field */
        $field = $this->fields->get($name);

        return new HtmlString(
            view($this->helper->getViewPath($field->getTemplate(), $this->theme), [
                'field' => $field,
            ])
        );
    }

    public function fields()
    {
        $html = '';

        foreach ($this->fields as $field) {
            $html .= view($this->helper->getViewPath($field->getTemplate(), $this->theme), [
                'field' => $field
            ]);
        }

        return new HtmlString($html);
    }
}
