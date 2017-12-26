<?php

namespace AnilcanCakir\Former\Fields;

use AnilcanCakir\Former\Form;
use Illuminate\Support\HtmlString;

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
     * The map of rules.
     *
     * @var array
     */
    protected $ruleMap = [];

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

    public function attributes()
    {
        $html = '';

        $ruleMap = $this->ruleMap;

        // If "required" is not exists, add it for default.
        if (!isset($ruleMap['required'])) {
            $ruleMap['required'] = 'required';
        }

        foreach ($this->ruleMap as $rule => $map)
        {
            // If the html rule is a boolean attribute, add this.
            if (is_string($map)) {
                if (in_array($rule, $this->rules)) {
                    $html .= " {$map}";
                }
            } else {
                // If the html rule has a variable, get it and use.
                list($mapAttribute, $index) = $map;

                foreach ($this->rules as $fieldRule) {
                    if (preg_match("/^{$rule}\:/", $fieldRule)) {
                        $explode = explode(':', $fieldRule);

                        $html .= " {$mapAttribute}=\"{$explode[$index]}\"";
                        break;
                    }
                }
            }
        }

        return new HtmlString($html);
    }
}
