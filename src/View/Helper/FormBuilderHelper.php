<?php

namespace Bupy7\Form\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Bupy7\Form\FormAbstract;
use Bupy7\Form\ErrorStore\ErrorStore;

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
     * @param FormAbstract|null $form
     * @return mixed
     */
    public function __invoke(FormAbstract $form = null)
    {
        $formBuilder = $this->formBuilder;
        if ($form !== null) {
            $formBuilder->setErrorStore(new ErrorStore($form->getMessages()));
            $formBuilder->bind($form->getValues());
        }
        return $formBuilder;
    }
}

