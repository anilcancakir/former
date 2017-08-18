<?php

namespace AnilcanCakir\Former\Contracts\Form;

use AnilcanCakir\Former\Form;
use Illuminate\Database\Eloquent\Model;

interface Factory
{
    /**
     * Make a form instance by using the rules.
     *
     * @param array $rules
     * @param Model|null $model
     * @param array $attributes
     * @param array $messages
     * @return Form
     */
    public function make(array $rules, Model $model = null, array $attributes = [], array $messages = []);

    /**
     * Make a form instance by using the form request.
     *
     * @param $formRequest
     * @param Model $model
     * @return Form
     */
    public function makeFromRequest($formRequest, Model $model);
}