<?php

namespace Bupy7\Form\Tests\Asset;

use Bupy7\Form\FormAbstract;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 2.0.0
 */
class SignInMethodForm extends FormAbstract
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
     * @param string $email
     * @return static
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

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

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
