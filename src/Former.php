<?php

namespace AnilcanCakir\Former;

use Illuminate\Database\Eloquent\Model;
use AnilcanCakir\Former\Contracts\Former as Contract;
use AnilcanCakir\Former\Contracts\FormerHelper as HelperContract;

/**
 * Class FormFactory.
 */
class Former implements Contract
{
    /**
     * The FormerHelper instance.
     *
     * @var HelperContract
     */
    private $helper;

    /**
     * FormFactory constructor.
     *
     * @param HelperContract $helper
     */
    public function __construct(HelperContract $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Make a form instance by using the rules.
     *
     * @param array $formRules
     * @param Model|null $model
     * @param null $theme
     * @return Form
     */
    public function make(array $formRules, Model $model = null, $theme = null)
    {
        $form = new Form(
            $model, $this->helper
        );

        if ($theme) {
            $form->setTheme($theme);
        }

        foreach ($formRules as $name => $rules) {
            if (is_string($rules)) {
                $rules = explode('|', $rules);
            }

            $form->addField(
                $this->helper->getFieldClassFromRules($rules),
                $name,
                $rules
            );
        }

        return $form;
    }

    /**
     * Make a form instance by using the form request.
     *
     * @param $formRequest
     * @param Model $model
     * @param string|null $theme
     * @return void
     */
    public function makeFromRequest($formRequest, Model $model, $theme = null)
    {
        // TODO: Implement makeFromRequest() method.
    }
}
