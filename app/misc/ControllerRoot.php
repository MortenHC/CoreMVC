<?php

abstract class ControllerRoot
{
    protected $action;
    protected $id;
    protected $model;

    public function __construct($action, $id)
    {
        $this->action = $action;
        $this->id     = $id;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function executeAction(...$arguments)
    {
        try {
            return $this->{$this->action}(...$arguments);
        } catch (InvalidArgumentException $e) {
            require_once __DIR__ . '/../controllers/ControllerErrorpage.php';
            $errorController = new ControllerErrorpage('standard', 'badRequest');
            $errorController->executeAction();
        }
    }

    protected function renderView(DataObject $dataObject, $template = 'Main')
    {
        $this->renderAlternativeView($dataObject, $this->action, $template);
    }

    protected function renderAlternativeView(DataObject $dataObject, $viewName, $template = "Main")
    {
        try {
            // Does the view exist?
            $viewFileName     = str_replace("Controller", "", get_class($this));
            $viewFileLocation = __DIR__ . "/../views/$viewFileName/$viewName.php";
            if (!file_exists($viewFileLocation)) {
                throw new MissingViewException(0, $viewFileName);
            } else {

                // Do we not want the template?
                if ($template == null) {
                    require_once $viewFileLocation;
                } else {

                    // Does the template view file exist?
                    $templateFileLocation = __DIR__ . "/../views/Template$template.php";
                    if (!file_exists($templateFileLocation)) {
                        throw new MissingViewException(1, "Template$template");
                    } else {
                        require_once $templateFileLocation;
                    }
                }
            }
        } catch (MissingViewException $e) {
            require_once __DIR__ . "/../controllers/ControllerErrorpage.php";
            $errorController = new ControllerErrorpage("standard", "standard");
            $errorController->executeAction();
        }
    }

    /**
     * If no action was specified, this method will be called
     */
    abstract protected function standard();
}
