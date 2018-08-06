<?php
class ControllerAlternativePage extends ControllerRoot
{
    public function __construct($action, $id)
    {
        parent::__construct($action, $id);

        // Create model object
        require_once __DIR__ . "/../models/ModelAlternativePage.php";
        $this->model = new ModelAlternativePage();
    }

    protected function standard()
    {
        $this->renderView($this->model->standard());
    }

    protected function doSomething()
    {
        $this->renderView($this->model->doSomething());
    }

    protected function defaultResponseTest()
    {
        DefaultResponse::unauthorized();
    }

    protected function view()
    {
        if ($this->id == "Alice") {
            $this->renderView($this->model->Alice());
        } else {
            throw new InvalidArgumentException();
        }
    }
}
