<?php

namespace Bupy7\Form\InputFilter;

/**
 * @author Belosludcev Vasilij <https://github.com/bupy7>
 * @since 1.2.2
 */
interface ErrorMessageInterface
{
    /**
     * Set error message for an input and mark an input as invalid.
     * @param string $name
     * @param string $message
     * @return static
     */
    public function setMessage($name, $message);
}
