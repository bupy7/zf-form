<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\FormAbstract;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 2.0.0
 */
class SignInScenarioForm extends FormAbstract
{
    const SCENARIO_PASSWORD = 2;

    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;

    protected function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_PASSWORD] = [
            'password',
        ];
        return $scenarios;
    }

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
