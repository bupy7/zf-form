<?php

namespace Bupy7\Form\Tests\View\Helper;

use PHPUnit_Framework_TestCase;
use Bupy7\Form\View\Helper\FormBuilderHelper;
use StdClass;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelperTest extends PHPUnit_Framework_TestCase
{
    /**
     * Instance class test.
     */
    public function testInstance()
    {
        $blankFormBuilder       = new StdClass;
        $blankFormBuilder->test = 'this is test';
        $formBuilderHelper      = new FormBuilderHelper($blankFormBuilder);
        $this->assertTrue($formBuilderHelper() instanceof StdClass);
        $this->assertEquals('this is test', $formBuilderHelper()->test);
    }
}

