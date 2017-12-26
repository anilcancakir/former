<?php
/** @var \AnilcanCakir\Former\Form $form */
?>

@if (in_array($form->getMethod(), ['POST', 'GET', 'post', 'get']))
    <form action="{{ $form->getAction() }}" method="{{ $form->getMethod() }}">
@else
    <form action="{{ $form->getAction() }}" method="POST">
    {{ method_field($form->getMethod()) }}
@endif

{{ csrf_field() }}