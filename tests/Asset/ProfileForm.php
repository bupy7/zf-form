<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\FormAbstract;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.2.1
 */
class ProfileForm extends FormAbstract
{
    /**
     * @var int
     */
    public $age;

    protected function inputs()
    {
        return [
            [
                'name' => 'age',
                'validators' => [
                    [
                        'name' => 'Digits',
                    ],
                    [
                       'name' => 'Between',
                       'options' => [
                            'min' => 1,
                            'max' => 100,
                       ],
                    ],
                ],
            ],
        ];
    }
}
