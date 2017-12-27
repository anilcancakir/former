<?php

namespace AnilcanCakir\Former\Contracts;

interface FormerHelper
{
    /**
     * Get view path.
     *
     * @param string|null $view
     * @param string $theme
     * @return string
     */
    public function getViewPath($view = null, $theme = null): string;

    /**
     * Get config value by given key.
     *
     * @param string $key
     * @return mixed
     */
    public function config($key);

    /**
     * Get field class from rules.
     *
     * @param array $rules
     * @return string
     */
    public function getFieldClassFromRules(array $rules): string;

    /**
     * Get field class from type.
     *
     * @param string $type
     * @return string
     */
    public function getFieldClassFromType($type): string;

    /**
     * Get given theme or default theme.
     *
     * @param null|string $theme
     * @return string
     */
    public function getThemeOrDefault($theme = null): string;

    /**
     * Get url by route name.
     *
     * @param string $route
     * @return string
     */
    public function getUrlByRoute($route): string;

    /**
     * Translate a given key.
     *
     * @param string $key
     * @return mixed|null
     */
    public function trans($key);
}
