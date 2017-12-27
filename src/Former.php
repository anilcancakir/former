<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\Former as Contract;
use AnilcanCakir\Former\Contracts\FormerHelper as HelperContract;
use Illuminate\Database\Eloquent\Model;

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
     * @param array $types
     * @return Form
     */
    public function make(array $formRules, Model $model = null, array $types = [])
    {
        $form = new Form(
            $model, $this->helper
        );

        foreach ($formRules as $name => $rules) {
            if (is_string($rules)) {
                $rules = explode('|', $rules);
            }

            $form->addField(
                $this->getInputByRulesAndTypes($name, $rules, $types),
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
     * @param array $types
     * @return Form
     */
    public function makeFromRequest($formRequest, Model $model, array $types = [])
    {
        // TODO: Implement makeFromRequest() method.

        return null;
    }

    /**
     * Get input class by rules and types for a field.
     *
     * @param string $name
     * @param string[] $rules
     * @param string[] $types
     * @return string
     */
    protected function getInputByRulesAndTypes($name, $rules, $types)
    {
        if (isset($types[$name])) {
            return $this->helper->getFieldClassFromType($types[$name]);
        }

        return $this->helper->getFieldClassFromRules($rules);
    }
}
