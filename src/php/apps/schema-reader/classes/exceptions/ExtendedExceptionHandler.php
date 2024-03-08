<?php

require_once 'ExtendedFoundationHandler.php';

class ExtendedExceptionHandler extends ExtendedFoundationHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}