<?php

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler;

class ExtendedFoundationHandler extends Handler
{
    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->register();
    }

    public function register()
    {
        //
    }

    public function reportable(callable $reportUsing)
    {
        Vemto::log('reportable');
    }
    
    public function renderable(callable $renderUsing)
    {
        //
    }
    
    public function report(\Throwable $e)
    {
        Vemto::log('report ' . $e->getMessage());
        //
    }
    
    protected function reportThrowable(\Throwable $e): void
    {
        //
    }

    public function render($request, \Throwable $e)
    {
        // 
    }

    protected function renderViaCallbacks($request, \Throwable $e)
    {
        // 
    }

    protected function renderExceptionWithSymfony(\Throwable $e, $debug)
    {
        //
    }

    protected function registerErrorViewPaths()
    {
        //
    }

    public function renderForConsole($output, \Throwable $e)
    {
        //
    }
}