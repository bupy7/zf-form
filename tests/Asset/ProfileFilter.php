<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\InputFilter\InputFilter;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.2.2
 */
class ProfileFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
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
        ]);
    }
}
