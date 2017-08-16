<?php

namespace Bupy7\Form\InputFilter;

use Zend\InputFilter\InputFilter as BaseInputFilter;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.2.2
 */
class InputFilter extends BaseInputFilter implements ErrorMessageInterface
{
    /**
     * {@inheritDoc}
     */
    public function setMessage($name, $message)
    {
        if (!$this->has($name)) {
            return $this;
        }
        $input = $this->get($name);
        $input->setErrorMessage($message);
        if (isset($this->validInputs[$name])) {
            unset($this->validInputs[$name]);
            $this->invalidInputs[$name] = $input;
        }
        return $this;
    }
}
