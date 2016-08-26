<?php

namespace Bupy7\Form\Tests\View\Helper;

use PHPUnit_Framework_TestCase;
use AdamWathan\Form\FormBuilder;
use Zend\ServiceManager\ServiceManager;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * A test class of instance.
     */
    public function testInstance()
    {
        $moduleConfig = require __DIR__ . '/../config/module.config.php';
        $serviceManager = new ServiceManager($moduleConfig['service_manager']);

        $formBuilder1 = $serviceManager->get('Bupy7\Form\FormBuilder');
        $this->assertInstanceOf(FormBuilder::class, $formBuilder1);
        
        $formBuilder2 = $serviceManager->get('AdamWathan\Form\FormBuilder');
        $this->assertInstanceOf(FormBuilder::class, $formBuilder2);
        
        $this->assertEquals($formBuilder1, $formBuilder2);

        $formBuilder1->setToken('test token 1');
        $formBuilder2->setToken('test token 2');     
        $this->assertNotEquals($formBuilder1, $formBuilder2);
    }
}

