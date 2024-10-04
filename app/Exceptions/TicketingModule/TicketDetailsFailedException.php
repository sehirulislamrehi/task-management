<?php

namespace App\Exceptions\TicketingModule;

use Exception;
use Throwable;

class TicketDetailsFailedException extends Exception
{
    public function __construct($message = 'Failed to insert ticket details info', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
