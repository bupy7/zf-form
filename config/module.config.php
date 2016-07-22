<?php
/**
 * Configuration file of the `Bupy7\Form` module.
 */
return [
    'service_manager' => [
        'factories' => [
            'AdamWathan\Form\FormBuilder' => 'Bupy7\Form\FormBuilderFactory',
        ],
        'shared' => [
            'AdamWathan\Form\FormBuilder' => false,
        ],
        'aliases' => [
            'Bupy7\Form\FormBuilder' => 'AdamWathan\Form\FormBuilder',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            'Bupy7\Form\View\Helper\FormBuilderHelper' => 'Bupy7\Form\View\Helper\FormBuilderHelperFactory',
        ],
        'shared' => [
            'Bupy7\Form\View\Helper\FormBuilderHelper' => false,
        ],
        'aliases' => [
            'formBuilder' => 'Bupy7\Form\View\Helper\FormBuilderHelper',
        ],
    ],
];
