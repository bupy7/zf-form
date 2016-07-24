<?php

namespace Bupy7\Form\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Bupy7\Form\FormAbstract;
use Bupy7\Form\ErrorStorage\ErrorStorage;
use AdamWathan\Form\FormBuilder;

/**
 * Helper of the form builder.
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class FormBuilderHelper extends AbstractHelper
{
    /**
     * @var FormBuilder
     */
    protected $formBuilder;

    /**
     * @param FormBuilder $formBuilder
     */
    public function __construct($formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Return instance of the FormBuilder.
     * @param FormAbstract|null $form If set instance of Form then would be set error storage and bind values.
     * @return FormBuilder
     */
    public function __invoke(FormAbstract $form = null)
    {
        $formBuilder = $this->formBuilder;
        if ($form !== null) {
            $formBuilder->setErrorStore(new ErrorStorage($form->getErrors()));
            $formBuilder->bind($form->getValues());
        }
        return $formBuilder;
    }
}

