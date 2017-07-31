<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\FormAbstract;

/**
 * @author Belosludcev Vasily <https://github.com/bupy7>
 * @since 1.2.1
 */
class NullForm extends FormAbstract
{
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;

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
                'required' => false,
                'filters' => [
                    [
                        'name' => 'ToNull',
                    ],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'max' => 6,
                        ],
                    ],
                ],
            ],
        ];
    }
}
