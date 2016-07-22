<?php

namespace Bupy7\Form;

use Interop\Container\ContainerInterface;
use AdamWathan\Form\FormBuilder;

/**
 * The factory of `FormBuilder`.
 * 
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderFactory
{
    /**
     * @param ContainerInterface $container
     * @return FormBuilder
     */
    public function __invoke(ContainerInterface $container)
    {
        return new FormBuilder;
    }
}
