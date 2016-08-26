<?php

namespace Bupy7\Form\View\Helper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * The factory of `FormBuilderHelper`.
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelperFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formBuilder = $container->get('Bupy7\Form\FormBuilder');
        return new FormBuilderHelper($formBuilder);
    }
}

