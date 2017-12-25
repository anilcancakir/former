<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\FormerHelper as Contract;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory as View;

class FormerHelper implements Contract
{
    /**
     * @var View
     */
    protected $view;

    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @var Config
     */
    protected $config;

    public function __construct(View $view, Translator $translator, Config $config)
    {
        $this->view = $view;
        $this->translator = $translator;
        $this->config = $config;
    }

    /**
     * Get view path.
     *
     * @param string|null $view
     * @param null $theme
     * @return string
     */
    public function getViewPath($view = null, $theme = null): string
    {
        // Update the theme variable
        $theme = $this->getThemeOrDefault($theme);

        $path = "former.{$theme}.{$view}";
        if ($this->view->exists($path)) {
            return $path;
        }

        return "former::{$theme}.{$view}";
    }

    /**
     * Get config value by given key.
     *
     * @param string $key
     * @return mixed
     */
    public function config($key)
    {
        return $this->config->get(
            "former.{$key}"
        );
    }

    /**
     * Get field class from rules.
     *
     * @param array $rules
     * @return string
     */
    public function getFieldClassFromRules(array $rules): string
    {
        foreach ($this->config('fields') as $input => $types)
        {
            foreach ($rules as $rule)
            {
                if (in_array($rule, $types)) {
                    return $input;
                }
            }
        }

        return $this->config('default_field');
    }

    /**
     * Get given theme or default theme.
     *
     * @param null|string $theme
     * @return string
     */
    public function getThemeOrDefault($theme = null): string
    {
        return $theme ?: $this->config('theme');
    }

    /**
     * Get the label of field by name.
     *
     * @param string $name
     * @return string
     */
    public function getLabel($name): string
    {
        $key = "validation.labels.{$name}";
        $trans = $this->translator->trans($key);

        return $trans == $key ? $this->translator->trans("validation.attributes.{$name}") : $trans;
    }

    /**
     * Get the placeholder of field by name.
     *
     * @param string $name
     * @return string|null
     */
    public function getPlaceholder($name)
    {
        $key = "validation.placeholders.{$name}";
        $trans = $this->translator->trans($key);

        if ($trans != $key) {
            return $trans;
        }

        return null;
    }

    /**
     * Get the text of field by name.
     *
     * @param string $name
     * @return string|null
     */
    public function getText($name)
    {
        $key = "validation.texts.{$name}";
        $trans = $this->translator->trans($key);

        if ($trans != $key) {
            return $trans;
        }
        return null;
    }
}