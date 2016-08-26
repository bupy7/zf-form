<?php

namespace Bupy7\Form\Tests\ErrorStorage;

use PHPUnit_Framework_TestCase;
use Bupy7\Form\Tests\Asset\SignInForm;
use Bupy7\Form\ErrorStorage\ErrorStorage;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormAstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testing error hints.
     */
    public function testErrorHints()
    {
        $signInForm = new SignInForm;
        $signInForm->setValues([
            'email' => 'test@gmail.co2m',
            'password' => '12q34e56t78',
        ]);
        $this->assertFalse($signInForm->isValid());

        $errorStorage = new ErrorStorage($signInForm->getErrors());
        $this->assertTrue($errorStorage->hasError('email'));
        $this->assertTrue(!empty($errorStorage->getError('email')));
    }
}

