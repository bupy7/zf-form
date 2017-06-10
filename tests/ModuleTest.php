<?php

namespace Bupy7\Form\Tests;

use PHPUnit_Framework_TestCase;
use Zend\Test\Util\ModuleLoader;
use Bupy7\Form\Module;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class ModuleTest extends PHPUnit_Framework_TestCase
{
    /**
     * A test of module loader.
     */
    public function testLoader()
    {
        $moduleLoader = new ModuleLoader([
            'modules' => [
                'Zend\Router',
                'Bupy7\Form',
            ],
            'module_listener_options' => [
                'module_paths' => [
                    __DIR__ . '/../src'
                ],
                'config_cache_enabled' => false,
                'module_map_cache_enabled' => false,
                'check_dependencies' => true,
            ],
        ]);
        $this->assertInstanceOf(Module::class, $moduleLoader->getModule('Bupy7\Form'));
    }
}
