<?php

namespace Bupy7\Form;

use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputInterface;

/**
 * Basic class of the form.
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
     * Setting values into input filter.
     * @param array $values
     * @return static
     */
    public function setValues($values)
    {
        $this->getInputFilter()->setData($values);
    }

    /**
     * Validate values.
     * @return boolean
     */
    public function isValid()
    {
        return $this->getInputFilter()->isValid();
    }

    /**
     * Returns values from the input filter.
     * @param boolean $onlyValid If set `true` then returns only validated values.
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
     * List of errors where a key is name of field and value is array messages.
     * @return array
     */
    public function getErrors()
    {
        return $this->getInputFilter()->getMessages();
    }

    /**
     * List of inputs form.
     * Each an element of an array should be like follow:
     * [
     *     'name'      => 'email',
     *     'required'  => true,
     *     'validators' => [
     *          [
     *              'name' => 'EmailAddress',
     *          ],
     *     ],
     *     // and etc
     * ]
     * @return array
     * @see InputInterface
     */
    protected function inputs()
    {
        return [];
    }

    /**
     * Attaching declaring inputs into input filter.
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
