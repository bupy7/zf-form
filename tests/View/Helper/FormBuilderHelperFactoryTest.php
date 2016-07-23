<?php

namespace Bupy7\Form\Tests\View\Helper;

use PHPUnit_Framework_TestCase;
use Zend\View\HelperPluginManager;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;
use AdamWathan\Form\FormBuilder;

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
        $viewHelpersConfig    = new Config($moduleConfig['view_helpers']);
        $helperPluginManager  = new HelperPluginManager($viewHelpersConfig);
        $serviceManagerConfig = new Config($moduleConfig['service_manager']);
        $serviceManager       = new ServiceManager($serviceManagerConfig);
        $helperPluginManager->setServiceLocator($serviceManager);

        $formBuilderHelper1 = $helperPluginManager->get('formBuilder');
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper1());

        $formBuilderHelper2 = $helperPluginManager->get('formBuilder');
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper2());

        $formBuilderHelper1()->setToken('test token 1');
        $formBuilderHelper2()->setToken('test token 2');
        $this->assertNotEquals($formBuilderHelper1(), $formBuilderHelper2());
    }
}

