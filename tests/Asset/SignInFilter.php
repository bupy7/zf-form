<?php

namespace Bupy7\Form\Tests\Asset;

use Zend\InputFilter\InputFilter;

/**
 * Input filter of signin.
 */
class SignInFilter extends InputFilter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->add([
            'name' => 'email',
            'required' => true,
            'validators' => [
                [
                    'name' => 'EmailAddress',
                ],
            ],
        ]);
        $this->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim',
                ],
            ],
        ]);
    }
}
