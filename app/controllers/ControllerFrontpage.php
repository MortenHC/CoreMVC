<?php
class ControllerFrontpage extends ControllerRoot
{
    public function __construct($action, $id)
    {
        parent::__construct($action, $id);

        // Create model object
        require_once __DIR__ . "/../models/ModelFrontpage.php";
        $this->model = new ModelFrontpage();
    }

    public function standard()
    {
        $this->renderView($this->model->standard());
    }
}
