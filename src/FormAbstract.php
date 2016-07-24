<?php

namespace Bupy7\Form;

use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;

/**
 * Basic class of the form.
 * 
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
abstract class FormAbstract
{
    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @param InputFilterInterface $inputFilter
     * @return static
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
        $this->attachInputs();
        return $this;
    }

    /**
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if ($this->inputFilter === null) {
            $this->setInputFilter(new InputFilter);
        }
        return $this->inputFilter;
    }

    /**
     * @param array $values
     * @return static
     */
    public function setValues($values)
    {
        $this->getInputFilter()->setData($values);
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->getInputFilter()->isValid();
    }

    /**
     * @param boolean $onlyValid
     * @return array
     */
    public function getValues($onlyValid = true)
    {
        if ($onlyValid) {
            return $this->getInputFilter()->getValues();
        }
        return $this->getInputFilter()->getRawValues();
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->getInputFilter()->getMessages();
    }

    /**
     * @return array
     */
    protected function inputs()
    {
        return [];
    }

    /**
     * @return static
     */
    protected function attachInputs()
    {
        foreach ($this->inputs() as $input) {
            $this->getInputFilter()->add($input);
        }
        return $this;
    }
}
