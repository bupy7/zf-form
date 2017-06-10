<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\FormAbstract;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.1.0
 */
class SignInAccessForm extends FormAbstract
{
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $password;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $password
     * @return static
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
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
