<?php

namespace Bupy7\Form\ErrorStorage;

use AdamWathan\Form\ErrorStore\ErrorStoreInterface;

/**
 * Storage of errors for the form builder.
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class ErrorStorage implements ErrorStoreInterface
{
    /**
     * @var array List of errors where a key is name of field and value is array messages.
     */
    protected $errors;

    /**
     * @param array $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * {@inheritDoc}
     */
    public function hasError($key)
    {
        return isset($this->errors[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function getError($key)
    {
        if ($this->hasError($key)) {
            return reset($this->errors[$key]);
        }
        return null;
    }
}
