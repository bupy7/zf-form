<?php
/**
 * Configuration file of the `Bupy7\Form` module.
 */

use Bupy7\Form\View\Helper\FormBuilderHelper;
use Bupy7\Form\View\Helper\FormBuilderHelperFactory;
use AdamWathan\Form\FormBuilder;
use Bupy7\Form\FormBuilderFactory;

return [
    'service_manager' => [
        'factories' => [
            FormBuilder::class => FormBuilderFactory::class,
        ],
        'shared' => [
            FormBuilder::class => false,
        ],
        'aliases' => [
            'Bupy7\Form\FormBuilder' => FormBuilder::class,
        ],
    ],
    'view_helpers' => [
        'factories' => [
            FormBuilderHelper::class => FormBuilderHelperFactory::class,
        ],
        'shared' => [
            FormBuilderHelper::class => false,
        ],
        'aliases' => [
            'formBuilder' => FormBuilderHelper::class,
        ],
    ],
];
