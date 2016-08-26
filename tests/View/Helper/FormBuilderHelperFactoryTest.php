<?php

namespace Bupy7\Form\Tests\View\Helper;

use PHPUnit_Framework_TestCase;
use Zend\View\HelperPluginManager;
use Zend\ServiceManager\ServiceManager;
use AdamWathan\Form\FormBuilder;
use Bupy7\Form\View\Helper\FormBuilderHelper;
use Bupy7\Form\Tests\Asset\SignInForm;

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
        $moduleConfig = require __DIR__ . '/../../../config/module.config.php';
        $serviceManager = new ServiceManager($moduleConfig['service_manager']);
        $helperPluginManager = new HelperPluginManager($serviceManager, $moduleConfig['view_helpers']);
        $signInForm = new SignInForm;

        $formBuilderHelper1 = $helperPluginManager->get('formBuilder');
        $formBuilderHelper1()->setToken('test token 1');
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper1());

        $formBuilderHelper2 = $helperPluginManager->get(FormBuilderHelper::class);
        $formBuilderHelper2()->setToken('test token 2');
        $this->assertInstanceOf(FormBuilder::class, $formBuilderHelper2($signInForm));
    
        $this->assertNotEquals($formBuilderHelper1(), $formBuilderHelper2());

    }
}

