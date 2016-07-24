<?php

namespace Bupy7\Form\ErrorStorage;

use AdamWathan\Form\ErrorStore\ErrorStoreInterface;

/**
 * Storage of errors for the form builder.
 * 
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.0.0
 */
class ErrorStorage implements ErrorStoreInterface
{
    /**
     * @var array
     */
    protected $messages;

    /**
     * @param array $messages
     */
    public function __construct(array $messages)
    {
        $this->messages = $messages;
    }

    /**
     * {@inheritDoc}
     */
    public function hasError($key)
    {
        return isset($this->messages[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function getError($key)
    {
        if ($this->hasError($key)) {
            return reset($this->messages[$key]);
        }
    }
}
