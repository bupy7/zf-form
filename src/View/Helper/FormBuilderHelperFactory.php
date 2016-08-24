<?php

namespace Bupy7\Form\View\Helper;

use Interop\Container\ContainerInterface;

/**
 * The factory of `FormBuilderHelper`.
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelperFactory
{
    /**
     * @param ContainerInterface $container
     * @return FormBuilderHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        $formBuilder = $container->get('Bupy7\Form\FormBuilder');
        return new FormBuilderHelper($formBuilder);
    }
}

