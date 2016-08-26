<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\FormAbstract;

/**
 * Form of signin.
 */
class SignInForm extends FormAbstract
{
    /**
     * {@inheritdoc}
     */
    protected function inputs()
    {
        return [
            [
                'name' => 'email',
                'required' => true,
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                    ],
                ],
            ],
            [
                'name' => 'password',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'StringTrim',
                    ]
                ],
            ],
        ];
    }
}