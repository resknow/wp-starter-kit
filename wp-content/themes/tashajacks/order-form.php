<?php

/**
 * Find template for the current step in the order form
 * based on the URL
 */
$template = 'type';
$available_templates = [
    'length' => 'length',
    'colour' => 'colour',
    'fitting-method' => 'fitting-method',
    'options' => 'options',
    'account' => 'account'
];

if ( array_key_exists( 'step', $_GET ) && in_array( $_GET['step'], $available_templates ) ) {
    $template = $available_templates[ $_GET['step'] ];
}

Timber::render(
    sprintf( 'order-form/%s.twig', $template ),
    get_context_with_fields()
);