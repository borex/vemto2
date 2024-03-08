<?php


use Illuminate\Foundation\Bootstrap\HandleExceptions;

class ExtendedHandleExceptions extends HandleExceptions
{
    public function handleError($level, $message, $file = '', $line = 0, $context = [])
    {
        return false;
    }

    public function handleDeprecationError($message, $file, $line, $level = E_DEPRECATED)
    {
        return false;
    }

    public function handleException(\Throwable $e)
    {
        return false;
    }

    protected function renderForConsole(\Throwable $e)
    {
        return false;
    }

    protected function renderHttpResponse(\Throwable $e)
    {
        return false;
    }

    public function handleShutdown()
    {
        return false;
    }

    protected function fatalErrorFromPhpError(array $error, $traceOffset = null)
    {
        return false;
    }
}