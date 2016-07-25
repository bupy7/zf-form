<?php

namespace Bupy7\Form;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * The module of Form.
 * @author Vasilij Belosludcev <https://github.com/bupy7>
 * @since 1.0.0
 */
class Module implements ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
