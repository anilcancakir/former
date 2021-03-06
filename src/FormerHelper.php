<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\FormerHelper as Contract;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Routing\UrlGenerator as Url;
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

    /**
     * @var Url
     */
    protected $url;

    public function __construct(View $view, Translator $translator, Config $config, Url $url)
    {
        $this->view = $view;
        $this->translator = $translator;
        $this->config = $config;
        $this->url = $url;
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
        foreach ($this->config('fields') as $input => $types) {
            foreach ($rules as $rule) {
                if (in_array($rule, $types)) {
                    return $input;
                }
            }
        }

        return $this->config('default_field');
    }

    /**
     * Get field class from type.
     *
     * @param string $type
     * @return string
     */
    public function getFieldClassFromType($type): string
    {
        foreach ($this->config('fields') as $input => $types) {
            if (in_array($type, $types)) {
                return $input;
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
     * Get url by route name.
     *
     * @param string $route
     * @return string
     */
    public function getUrlByRoute($route): string
    {
        return $this->url->route($route);
    }

    /**
     * Translate a given key.
     *
     * @param string $key
     * @return mixed|null
     */
    public function trans($key)
    {
        $trans = $trans = $this->translator->trans($key);

        return $trans != $key ? $trans : null;
    }
}
