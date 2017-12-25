<?php
/** @var \AnilcanCakir\Former\Fields\Input $field */
$placeholder = $field->getPlaceholder();
$text = $field->getText();
?>

@component('former::bootstrap.form-group')
    <label for="input{{ $field->getName() }}">{{ $field->getLabel() }}</label>
    <input
            name="{{ $field->getName() }}"
            id="input{{ $field->getName() }}"
            type="text" class="form-control"
            {!! $placeholder ? 'placeholder="' . htmlspecialchars($placeholder) . '"' : '' !!}
    />

    @if ($text)
        <span class="help-block">{{ $text }}</span>
    @endif
@endcomponent