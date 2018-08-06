<?php

class ControllerException extends Exception
{
    public $requestedController;
    public $requestedAction;

    public function __construct($code, $requestedController = null, $requestedAction = null, $message = '')
    {
        $this->requestedController = $requestedController;
        $this->requestedAction     = $requestedAction;

        if ($message == '') {
            if ($code == 0) {
                $message = 'Controller file not found!';
            } else if ($code == 1) {
                $message = 'Controller class not found!';
            } else if ($code == 2) {
                $message = 'Invalid controller! Not a child of the RootController.';
            } else if ($code == 3) {
                $message = 'Controller found, but action is invalid!';
            }
        }
        parent::__construct($message, $code, null);
    }
}

class MissingViewException extends Exception
{
    public $missingView;

    public function __construct($code, $missingView, $message = '')
    {
        $this->missingView = $missingView;

        if ($message == '') {
            if ($code == 0) {
                $message = 'View file not found!';
            } else if ($code == 1) {
                $message = 'Template view file not found!';
            }
        }
        parent::__construct($message, $code, null);
    }
}
