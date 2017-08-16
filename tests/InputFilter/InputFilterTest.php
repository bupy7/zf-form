<?php

namespace Bupy7\Form\Tests\InputFilter;

use PHPUnit_Framework_TestCase;
use Bupy7\Form\Tests\Asset\ProfileFilter;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.2.2
 */
class InputFilterTest extends PHPUnit_Framework_TestCase
{
    public function testSetMessage()
    {
        $profileFilter = new ProfileFilter;
        $profileFilter->setData(['age' => 23]);

        $this->assertTrue($profileFilter->isValid());
        $this->assertEmpty($profileFilter->getMessages());

        $message = 'Today you can only to set age between 50 and 80.';
        $profileFilter->setMessage('age', $message);

        $this->assertNotEmpty($profileFilter->getMessages());
        $this->assertEquals($message, $profileFilter->getMessages()['age'][0]);
    }

    public function testSetMessageForNotExistsInput()
    {
        $profileFilter = new ProfileFilter;
        $profileFilter->setData(['age' => 23]);

        $this->assertTrue($profileFilter->isValid());
        $this->assertEmpty($profileFilter->getMessages());

        $message = 'Input not exists.';
        $profileFilter->setMessage('not_exists', $message);

        $this->assertEmpty($profileFilter->getMessages());
        $this->assertNotEquals(
            $message,
            isset($profileFilter->getMessages()['not_exists'][0])
                ? $profileFilter->getMessages()['not_exists'][0]
                : ''
        );
    }

    public function testSetMessageForInvalidInput()
    {
        $profileFilter = new ProfileFilter;
        $profileFilter->setData(['age' => 150]);

        $this->assertFalse($profileFilter->isValid());
        $this->assertNotEmpty($profileFilter->getMessages());

        $message = 'You have set age large than you have.';
        $profileFilter->setMessage('age', $message);

        $this->assertNotEmpty($profileFilter->getMessages());
        $this->assertEquals($message, $profileFilter->getMessages()['age'][0]);
    }
}
