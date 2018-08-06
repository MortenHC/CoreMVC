<?php
class ControllerErrorpage extends ControllerRoot
{
    public function __construct($action, $id)
    {
        parent::__construct($action, $id);

        // Create model object
        require_once __DIR__ . "/../models/ModelErrorpage.php";
        $this->model = new ModelErrorpage();
    }

    protected function standard()
    {
        if ($this->id == "badRequest") {
            $model = $this->model->badRequest();
        } else if ($this->id == "unauthorized") {
            $model = $this->model->unauthorized();
        } else if ($this->id == "forbidden") {
            $model = $this->model->forbidden();
        } else if ($this->id == "notFound") {
            $model = $this->model->notFound();
        } else if ($this->id == "methodNotAllowed") {
            $model = $this->model->methodNotAllowed();
        } else if ($this->id == "serverError") {
            $model = $this->model->serverError();
        } else {
            $model = $this->model->standard();
        }
        http_response_code($model->get("httpCode"));
        $this->renderView($model);
    }

    protected function custom($message, $httpCode)
    {
        $model = $this->model->custom();
        $model->set("errorMessage", $message);
        $model->set('httpCode', $httpCode);
        $this->renderAlternativeView($model, 'standard');
    }
}
