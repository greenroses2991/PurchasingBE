<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use App\Exceptions\ApiNotFoundException;

// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    // protected $dontReport = [
    //     ApiNotFoundException::class,
    // ];



//     public function render($request, Throwable $exception)
// {
//     if ($exception instanceof ModelNotFoundException) {
//         return response()->json(['error' => 'Resource not found.'], 404);
//     }

//     return parent::render($request, $exception);
// }
   
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
