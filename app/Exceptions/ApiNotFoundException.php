<?php

namespace App\Exceptions;

use Exception;

class ApiNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->json(['errors' => 'Resource not found please contact the support dept!.'], 404);
    }
    // protected $message = 'resource not found please contact the support dept';
    // protected $code = 404;
}


