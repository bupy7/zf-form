<?php

namespace Bupy7\Form\Tests;

use PHPUnit_Framework_TestCase;
use Bupy7\Form\Tests\Asset\SignInForm;
use Bupy7\Form\Tests\Asset\SignInFilter;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormAstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testing inputs data.
     */
    public function testInputs()
    {
        // valid
        $signInForm = new SignInForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
            'password' => '12q34e56t78',
        ]);
        $this->assertTrue($signInForm->isValid());

        // invalid
        $signInForm = new SignInForm;
        $signInForm->setValues([
            'email' => 'test@gmail.never',
            'password' => '',
        ]);
        $this->assertFalse($signInForm->isValid());
        $errors = $signInForm->getErrors();
        $this->assertTrue(!empty($errors));
    }

    /**
     * Testing outputs data.
     */
    public function testOutputs()
    {
        // valid
        $signInForm = new SignInForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
            'password' => ' 12q34e56t78 ',
        ]);
        $this->assertTrue($signInForm->isValid());
        $values = $signInForm->getValues();
        $this->assertEquals('12q34e56t78', $values['password']);
        $values = $signInForm->getValues(false);
        $this->assertEquals(' 12q34e56t78 ', $values['password']);

        // invalid
        $signInForm = new SignInForm;
        $signInForm->setValues([
            'email' => 'test@gmail.co2m',
            'password' => ' 12q34e56t78 ',
        ]);
        $this->assertFalse($signInForm->isValid());
        $values = $signInForm->getValues();
        $this->assertEquals('12q34e56t78', $values['password']);
        $values = $signInForm->getValues(false);
        $this->assertEquals(' 12q34e56t78 ', $values['password']);
    }

    /**
     * Testing instance of input filter.
     */
    public function testInstanceInputFilter()
    {
        $signInForm = new SignInForm;
        $signInForm->setInputFilter(new SignInFilter);
        $this->assertInstanceOf(SignInFilter::class, $signInForm->getInputFilter());
        $signInForm->setValues([]);
        $this->assertFalse($signInForm->isValid());
    }
}

