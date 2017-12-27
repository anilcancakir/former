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
     * The default map of rules.
     *
     * @var array
     */
    protected $defaultRulesMap = [
        'required' => 'required'
    ];

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
        // Check the "labels" first.
        if ($trans = $this->form->getHelper()->trans("validation.labels.{$this->name}")) {
            return $trans;
        }

        if ($trans = $this->form->getHelper()->trans("validation.attributes.{$this->name}")) {
            return $trans;
        }

        return $this->name;
    }

    /**
     * Get the placeholder of field.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        if ($trans = $this->form->getHelper()->trans("validation.placeholders.{$this->name}")) {
            return $trans;
        }

        return null;
    }

    /**
     * Get the text of field.
     *
     * @return null|string
     */
    public function getText()
    {
        if ($trans = $this->form->getHelper()->trans("validation.texts.{$this->name}")) {
            return $trans;
        }

        return null;
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

    /**
     * Get html of attributes.
     *
     * @return HtmlString
     */
    public function attributes()
    {
        $html = '';

        foreach ($this->getRuleMaps() as $rule => $map) {
            // If the html rule is a boolean attribute, add this.
            if (is_string($map)) {
                $html .= $this->getHtmlOfBooleanAttribute($map, $rule);
            } else {
                // If the html rule has a variable, get it and use.
                $html .= $this->getHtmlOfAttribute($map, $rule);
            }
        }

        return new HtmlString($html);
    }

    /**
     * Get default and field rule maps.
     *
     * @return array
     */
    protected function getRuleMaps()
    {
        return array_merge(
            $this->defaultRulesMap, $this->ruleMap
        );
    }

    /**
     * Get html of boolean attribute.
     *
     * @param string $map
     * @param string $rule
     * @return string
     */
    protected function getHtmlOfBooleanAttribute($map, $rule): string
    {
        if (in_array($rule, $this->rules)) {
            return " {$map}";
        }

        return '';
    }

    /**
     * Get html of attribute.
     *
     * @param array $map
     * @param string $rule
     * @return string
     */
    protected function getHtmlOfAttribute($map, $rule): string
    {
        list($mapAttribute, $index) = $map;

        foreach ($this->rules as $fieldRule) {
            if (preg_match("/^{$rule}\:/", $fieldRule)) {
                $explode = explode(':', $fieldRule);

                return " {$mapAttribute}=\"{$explode[$index]}\"";
            }
        }

        return '';
    }
}
