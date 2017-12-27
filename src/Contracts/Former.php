<?php

namespace AnilcanCakir\Former\Contracts;

use AnilcanCakir\Former\Form;
use Illuminate\Database\Eloquent\Model;

interface Former
{
    /**
     * Make a form instance by using the rules.
     *
     * @param array $rules
     * @param Model|null $model
     * @param array $types
     * @return Form
     */
    public function make(array $rules, Model $model = null, array $types = []);

    /**
     * Make a form instance by using the form request.
     *
     * @param $formRequest
     * @param Model $model
     * @param array $types
     * @return Form
     */
    public function makeFromRequest($formRequest, Model $model, array $types = []);
}
