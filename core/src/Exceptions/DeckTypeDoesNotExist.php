<?php

namespace Core\Exceptions;

use Throwable;

class DeckTypeDoesNotExist extends \Exception
{
    public function __construct($name, string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}