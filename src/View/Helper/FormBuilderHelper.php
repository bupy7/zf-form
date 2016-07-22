<?php

namespace Bupy7\Form\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Form builder helper.
 * 
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelper extends AbstractHelper
{
    /**
     * @var mixed
     */
    protected $formBuilder;

    /**
     * @param mixed $formBuilder
     */
    public function __construct($formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Return instance of form builder.
     * @return mixed
     */
    public function __invoke()
    {
        return $this->formBuilder;
    }
}

