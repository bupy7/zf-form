<?php

namespace Bupy7\Form\Tests;

use Bupy7\Form\Tests\Asset\EmptyForm;
use Bupy7\Form\Tests\Asset\SignInFilter;
use Bupy7\Form\Tests\Asset\SignInMethodForm;
use Bupy7\Form\Tests\Asset\SignInAccessForm;
use Bupy7\Form\Tests\Asset\SignInPropertyForm;
use Bupy7\Form\Tests\Asset\SignInScenarioForm;
use Bupy7\Form\Tests\Asset\NullForm;
use PHPUnit_Framework_TestCase;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormAstractTest extends PHPUnit_Framework_TestCase
{
    public function testInstanceInputFilter()
    {
        $signInForm = new SignInPropertyForm;
        $signInForm->setInputFilter(new SignInFilter);
        $this->assertInstanceOf(SignInFilter::class, $signInForm->getInputFilter());
        $signInForm->setValues([]);
        $this->assertFalse($signInForm->isValid());
    }

    public function testEmptyInputs()
    {
        $emptyForm = new EmptyForm;
        $emptyForm->setValues([]);
        $this->assertTrue($emptyForm->isValid());
    }

    /**
     * @since 1.1.0
     */
    public function testValidInputs()
    {
        // properties
        $signInForm = new SignInPropertyForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
            'password' => '12q34e56t78',
        ]);
        $this->assertTrue($signInForm->isValid());
        $this->assertFalse($signInForm->hasErrors());
        // methods
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
            'password' => '12q34e56t78',
        ]);
        $this->assertTrue($signInForm->isValid());
        $this->assertFalse($signInForm->hasErrors());
    }

    /**
    * @since 1.1.0
    */
    public function testInvalidInputs()
    {
        // properties
        $signInForm = new SignInPropertyForm;
        $signInForm->setValues([
            'email' => 'test@gmail.never',
            'password' => '',
        ]);
        $this->assertFalse($signInForm->isValid());
        $errors = $signInForm->getErrors();
        $this->assertTrue(!empty($errors));
        $this->assertTrue($signInForm->hasErrors());
        // methods
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.never',
            'password' => '',
        ]);
        $this->assertFalse($signInForm->isValid());
        $errors = $signInForm->getErrors();
        $this->assertTrue(!empty($errors));
        $this->assertTrue($signInForm->hasErrors());
    }

    /**
     * @since 1.1.0
     */
    public function testValidGroupInputs()
    {
        // properties
        $signInForm = new SignInPropertyForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
        ]);
        $this->assertTrue($signInForm->isValid('email'));
        $this->assertFalse($signInForm->hasErrors());
        // methods
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
        ]);
        $this->assertTrue($signInForm->isValid('email'));
        $this->assertFalse($signInForm->hasErrors());
    }

    /**
     * @since 1.1.0
     */
    public function testInvalidGroupInputs()
    {
        // properties
        $signInForm = new SignInPropertyForm;
        $signInForm->setValues([
            'email' => 'test@gmail.never',
        ]);
        $this->assertFalse($signInForm->isValid('email'));
        $errors = $signInForm->getErrors();
        $this->assertTrue(!empty($errors));
        $this->assertTrue($signInForm->hasErrors());
        // methods
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.never',
        ]);
        $this->assertFalse($signInForm->isValid('email'));
        $errors = $signInForm->getErrors();
        $this->assertTrue(!empty($errors));
        $this->assertTrue($signInForm->hasErrors());
    }

    /**
     * @since 1.1.0
     */
    public function testValidOutputs()
    {
        // properties
        $signInForm = new SignInPropertyForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
        ]);
        $signInForm->password = ' 12q34e56t78 ';
        $this->assertTrue($signInForm->isValid());
        $values = $signInForm->getValues();
        $this->assertEquals('12q34e56t78', $values['password']);
        $this->assertEquals('12q34e56t78', $signInForm->password);
        // methods
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
        ]);
        $signInForm->setPassword(' 12q34e56t78 ');
        $this->assertTrue($signInForm->isValid());
        $values = $signInForm->getValues();
        $this->assertEquals('12q34e56t78', $values['password']);
        $this->assertEquals('12q34e56t78', $signInForm->getPassword());
        $this->assertEquals('12q34e56t78', $signInForm->password);
    }

    /**
     * @since 1.1.0
     */
    public function testInvalidOutputs()
    {
        // properties
        $signInForm = new SignInPropertyForm;
        $signInForm->setValues([
            'email' => 'test@gmail.co2m',
        ]);
        $signInForm->password = ' 12q34e56t78 ';
        $this->assertFalse($signInForm->isValid());
        $values = $signInForm->getValues();
        $this->assertEquals('12q34e56t78', $values['password']);
        $this->assertEquals('12q34e56t78', $signInForm->password);
        // methods
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.co2m',
        ]);
        $signInForm->setPassword(' 12q34e56t78 ');
        $this->assertFalse($signInForm->isValid());
        $values = $signInForm->getValues();
        $this->assertEquals('12q34e56t78', $values['password']);
        $this->assertEquals('12q34e56t78', $signInForm->password);
        $this->assertEquals('12q34e56t78', $signInForm->getPassword());
    }

    /**
     * @since 1.1.0
     */
    public function testValidGet()
    {
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
        ]);
        $this->assertTrue($signInForm->isValid('email'));
        $this->assertEquals('test@gmail.com', $signInForm->email);
    }

    /**
     * @expectedException \Bupy7\Form\Exception\UnknownPropertyException
     * @since 1.1.0
     */
    public function testInvalidGet()
    {
        $signInForm = new SignInMethodForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
        ]);
        $this->assertTrue($signInForm->isValid('email'));
        $this->assertEquals('test@gmail.com', $signInForm->unknownEmail);
    }

    /**
     * @since 1.1.0
     */
    public function testValidSet()
    {
        $signInForm = new SignInMethodForm;
        $signInForm->email = 'test@gmail.com';
        $this->assertTrue($signInForm->isValid('email'));
    }

    /**
     * @expectedException \Bupy7\Form\Exception\UnknownPropertyException
     * @since 1.1.0
     */
    public function testInvalidSet()
    {
        $signInForm = new SignInMethodForm;
        $signInForm->unknownEmail = 'test@gmail.com';
    }

    /**
     * @expectedException \Bupy7\Form\Exception\InvalidCallException
     * @since 1.1.0
     */
    public function testWriteOnly()
    {
        $signInForm = new SignInAccessForm;
        $signInForm->password = '12q34e56t78';
        $this->assertTrue($signInForm->isValid('password'));
        $this->assertEquals('12q34e56t78', $signInForm->password);
    }

    /**
     * @expectedException \Bupy7\Form\Exception\InvalidCallException
     * @since 1.1.0
     */
    public function testReadOnly()
    {
        $signInForm = new SignInAccessForm;
        $signInForm->email = 'test@gmail.com';
    }

    /**
     * @since 1.1.0
     */
    public function testScenario()
    {
        // DEFAULT scenario
        $signInForm = new SignInScenarioForm;
        $signInForm->email = 'test@gmail.com';
        $signInForm->password = '12q34e56t78';
        $this->assertTrue($signInForm->isValid());
        $this->assertEquals(SignInScenarioForm::SCENARIO_DEFAULT, $signInForm->getScenario());
        // PASSWORD scenario
        $signInForm->setScenario(SignInScenarioForm::SCENARIO_PASSWORD);
        $signInForm->email = null;
        $this->assertTrue($signInForm->isValid());
        $this->assertEquals(SignInScenarioForm::SCENARIO_PASSWORD, $signInForm->getScenario());
    }

    /**
     * @since 1.2.1
     */
    public function testNullValues()
    {
        $signInForm = new NullForm;
        $signInForm->setValues([
            'email' => 'test@gmail.com',
            'password' => '',
        ]);
        $this->assertTrue($signInForm->isValid());
        $this->assertNull($signInForm->password);
    }
}
