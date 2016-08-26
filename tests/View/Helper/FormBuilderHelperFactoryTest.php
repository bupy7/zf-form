<?php

namespace Bupy7\Form\Tests\View\Helper;

use PHPUnit_Framework_TestCase;
use Zend\View\HelperPluginManager;
use Zend\ServiceManager\ServiceManager;
use AdamWathan\Form\FormBuilder;
use Bupy7\Form\View\Helper\FormBuilderHelper;

/**
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelperFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * A test class of instance
     */
    public function testInstance()
    {
        $moduleConfig         = require __DIR__ . '/../../../config/module.config.php';
        $serviceManager       = new ServiceManager($moduleConfig['service_manager']);
        $helperPluginManager  = new HelperPluginManager($serviceManager, $moduleConfig['view_helpers']);

        $formBuilderHelper1 = $helperPluginManager->get('formBuilder');
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper1());

        $formBuilderHelper2 = $helperPluginManager->get('formBuilder');
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper2());

        $formBuilderHelper3 = $helperPluginManager->get(FormBuilderHelper::class);
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper3());

        $formBuilderHelper4 = $helperPluginManager->get(FormBuilderHelper::class);
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper4());

        $formBuilderHelper1()->setToken('test token 1');
        $formBuilderHelper2()->setToken('test token 2');
        $formBuilderHelper3()->setToken('test token 3');
        $formBuilderHelper4()->setToken('test token 4');
        $this->assertNotEquals($formBuilderHelper1(), $formBuilderHelper2());
        $this->assertNotEquals($formBuilderHelper3(), $formBuilderHelper4());
    }
}

