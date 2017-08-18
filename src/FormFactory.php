<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\Form\Factory;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Contracts\Config\Repository as Config;

/**
 * Class FormFactory
 * @package AnilcanCakir\Former
 */
class FormFactory implements Factory
{
    /**
     * The view factory.
     *
     * @var View
     */
    private $view;

    /**
     * The translator.
     *
     * @var Translator
     */
    private $translator;

    /**
     * The config repository.
     *
     * @var Config
     */
    private $config;

    /**
     * FormFactory constructor.
     *
     * @param View $view
     * @param Translator $translator
     * @param Config $config
     */
    public function __construct(View $view, Translator $translator, Config $config)
    {
        $this->view = $view;
        $this->translator = $translator;
        $this->config = $config;
    }

    /**
     * Make a form instance by using the rules.
     *
     * @param array $rules
     * @param Model|null $model
     * @param array $attributes
     * @param array $messages
     * @return Form
     */
    public function make(array $rules, Model $model = null, array $attributes = [], array $messages = [])
    {
        // TODO: Implement make() method.
    }

    /**
     * Make a form instance by using the form request.
     *
     * @param $formRequest
     * @param Model $model
     * @return Form
     */
    public function makeFromRequest($formRequest, Model $model)
    {
        // TODO: Implement makeFromRequest() method.
    }
}