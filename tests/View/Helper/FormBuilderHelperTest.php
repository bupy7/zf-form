<?php

namespace Bupy7\Form\Tests\View\Helper;

use PHPUnit_Framework_TestCase;
use Bupy7\Form\View\Helper\FormBuilderHelper;
use AdamWathan\Form\FormBuilder;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelperTest extends PHPUnit_Framework_TestCase
{
    /**
     * A test class of instance
     */
    public function testInstance()
    {
        $formBuilderHelper = new FormBuilderHelper(new FormBuilder);
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper());
    }
}

