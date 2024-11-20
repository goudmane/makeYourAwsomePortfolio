<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{

    protected $message = "The provided credentials are incorrect.";
    protected $code = 401;
    
    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }
}
