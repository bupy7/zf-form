<?php

namespace Bupy7\Form\Tests\Asset;

use Zend\InputFilter\InputFilter;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class SignInFilter extends InputFilter
{
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
