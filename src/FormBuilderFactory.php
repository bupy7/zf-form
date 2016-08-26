<?php

namespace Bupy7\Form;

use Interop\Container\ContainerInterface;
use AdamWathan\Form\FormBuilder;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * The factory of `FormBuilder`.
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new FormBuilder;
    }
}
